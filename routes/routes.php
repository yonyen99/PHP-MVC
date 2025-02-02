<?php
require 'Router.php';
require './app/controllers/UserController.php';
require './app/controllers/CategoryController.php';
require './app/controllers/ProductController.php';

$routes = new Router();
// user 
$routes->get('/', [UserController::class, 'index']);
$routes->get('/user/create', [UserController::class, 'create']);
$routes->post('/user/store', [UserController::class, 'store']);
$routes->get('/user/edit', [UserController::class, 'edit']);
$routes->put('/user/update', [UserController::class, 'update']);
$routes->delete('/user/delete', [UserController::class, 'destroy']);

// category
$routes->get('/categories', [CategoryController::class, 'index']);
$routes->get('/category/create', [CategoryController::class, 'create']);
$routes->post('/category/store', [CategoryController::class, 'store']);
$routes->get('/category/edit', [CategoryController::class, 'edit']);
$routes->post('/category/update', [CategoryController::class, 'update']);
$routes->post('/category/delete', [CategoryController::class, 'destroy']);

// products
$routes->get('/products', [ProductController::class, 'index']);
$routes->get('/product/create', [ProductController::class, 'create']);
$routes->post('/product/store', [ProductController::class, 'store']);
$routes->get('/product/edit', [ProductController::class, 'edit']);
$routes->post('/product/update', [ProductController::class, 'update']);
$routes->post('/product/delete', [ProductController::class, 'destroy']);
$routes->get('/product/show', [ProductController::class, 'show']);

// dispatch
$routes->dispatch()

?>
