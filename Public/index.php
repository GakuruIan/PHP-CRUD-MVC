<?php
require_once __DIR__.'/../vendor/autoload.php';

use app\Router;
use app\controller\ProductController;

$route=new Router();
$route->get('/',[ProductController::class,'index']);
$route->get('/products',[ProductController::class,'index']);
$route->get('/products/create',[ProductController::class,'create']);
$route->post('/products/create',[ProductController::class,'create']);
$route->get('/products/update',[ProductController::class,'update']);
$route->post('/products/update',[ProductController::class,'update']);
$route->post('/products/delete',[ProductController::class,'delete']);

$route->resolve();
