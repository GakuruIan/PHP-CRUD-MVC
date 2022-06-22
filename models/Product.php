<?php

namespace app\models;

use app\utils\UtilHelper;
use app\Database;

//defining model for product
class Product{
    public ?int $id=null;
    public ?float $price=null;
    public ?string $desc=null;
    public ?string $title=null;
    public ?string $imagepath=null;
    public ?string  $date;
    public ?array $image=null;

    public function __construct(){

    }

    public function load($data){
     $this->id=$data['id'] ?? null;
     $this->title=$data['title'];
     $this->desc=$data['desc'] ?? '';
     $this->price=(float)$data['price'];
     $this->imageFile=$data['imageFile'] ?? null;
     $this->imagepath=$data['image'] ?? null;
     $this->date= date('Y-m-d');
    }

    public function save(){
     $errors=[];
     if(!$this->title){
         $errors[]='Please fill in the title';
     }
     if(!$this->price){
         $errors[]='Please fill in the Price';
     }
     if(!is_dir(__DIR__ .'/../Public/Image')){
        mkdir(__DIR__ .'/../Public/Image');
    }
    if(empty($errors)){
        if($this->imageFile && $this->imageFile['tmp_name']){
  
            if($this->imagepath){
                unlink(__DIR__.'/../Public/'.$this->imagepath);
            }

            $this->imagepath='Image/'.UtilHelper::RandomString(8).'/'.$this->imageFile['name'];
            mkdir(dirname(__DIR__.'/../Public/'.$this->imagepath));
            move_uploaded_file($this->imageFile['tmp_name'],__DIR__.'/../Public/'.$this->imagepath);
        }
    }
    $db=Database::$db;
    if($this->id){
        $db->UpdateProduct($this);
    }else{
        $db->CreateProduct($this);
    }
    return $errors;
 }
}