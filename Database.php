<?php

namespace app;
use PDO;
use app\models\Product;
class Database
{
    public PDO  $pdo;
    public static Database $db;
public function __construct()
{
    $this->pdo=new PDO('mysql:host=localhost;port=3306;dbname=Products;','root','');
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    self::$db=$this;
}
public function getProducts($search=''){
    if($search){
        $statement=$this->pdo->prepare("select * from product where title like :search");
        $statement->bindValue('search',"%$search%");
    }
    else{
        $statement=$this->pdo->prepare("select * from product order by Create_date desc");
    }
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
public function CreateProduct(Product $product){
    $stmt= $this->pdo->prepare('insert into product(title,description,image,price,Create_date)values(:title,:description,:image,:price,:date)');
    $stmt->bindValue(':title',$product->title);
    $stmt->bindValue(':description',$product->desc);
    $stmt->bindValue(':image',$product->imagepath);
    $stmt->bindValue(':price',$product->price);
    $stmt->bindValue(':date',$product->date);
    $stmt->execute();
}
public function DeleteProduct($id){
    $stmt=$this->pdo->prepare('delete from product where id=:id');
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    header('Location:/products');
}
public function GetProductId($id){
    $stmt=$this->pdo->prepare("select * from product where id =:id");
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function UpdateProduct(Product $product){
    echo '<pre>';
    var_dump($product);
    echo '</pre>';
    $stmt=$this->pdo->prepare('update product set title=:title, description=:desc,image=:image,price=:price where id=:id');
    $stmt->bindValue(':title',$product->title);
    $stmt->bindValue(':desc',$product->desc);
    $stmt->bindValue(':image',$product->imagepath);
    $stmt->bindValue(':price',$product->price);
    $stmt->bindValue(':id',$product->id);
    $stmt->execute();
}
}