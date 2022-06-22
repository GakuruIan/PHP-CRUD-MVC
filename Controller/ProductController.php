<?php

namespace app\controller;

use app\Router;
use app\models\Product;

  class ProductController{
      public static function  index(Router $router){
             $search=$_GET['search'] ?? '';
             $products=$router->db->getProducts($search);
             $router->renderViews('products/index',[
                    'products'=> $products,
                    'search'=>$search]);
      }
      public static function create(Router $router){
             $errors=[];
             $productInfo=[
                    'title'=>'',
                    'description'=>'',
                    'image'=>'',
                     'price'=>''
             ];
             if($_SERVER['REQUEST_METHOD']=='POST'){
                    $productInfo['title']=$_POST['title'];
                    $productInfo['description']=$_POST['Description'];
                    $productInfo['price']=$_POST['price'];
                    $productInfo['imageFile']=$_FILES['image'];

                    $product= new Product();
                    $product->load($productInfo);
                    $errors=$product->save();
                    if(empty($errors)){
                           header('location:/products');
                           exit;
                    }
             }

            $router->renderViews('products/create',['product'=> $productInfo,'errors'=>$errors]);
      }
      public static function update(Router $route){
            $id=$_GET['id'] ?? null;
            $errors=[];
            if(!$id){
              header("location:/products");
              exit;
            }
       $productInfo= $route->db->GetProductId($id);
       if($_SERVER['REQUEST_METHOD']=='POST'){
              $productInfo['title']=$_POST['title'];
              $productInfo['desc']=$_POST['Description'];
              $productInfo['price']=$_POST['price'];
              $productInfo['imageFile']=$_FILES['image'];

              $product= new Product();
              $product->load($productInfo);
              $errors=$product->save();
              if(empty($errors)){
                     header('location:/products');
                     exit;
              }
       }
       $route->renderViews('products/update',['product'=>$productInfo,'errors'=>$errors]);
}
      public static  function delete(Router $route){
             $id=$_POST['id'] ?? null;
             if(!$id){
                    header("location:/products");
                    exit;
             }
           $route->db->DeleteProduct($id);
             header("location:/products");
      }

  }