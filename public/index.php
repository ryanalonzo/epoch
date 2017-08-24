<?php

session_start();

require_once('../vendor/autoload.php');

$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

$router = new \Epoch\Router($_SERVER['REQUEST_URI']);

$router->get('', 'NavController::showHome');
$router->get('loginSignup', 'NavController::showLoginSignup');
$router->get('logout', 'UserController::logout');
$router->get('addNewProduct', 'NavController::showAddNewProduct');
$router->get('editProduct', 'NavController::showEditProduct');
$router->get('products', 'ProductController::showProducts');
$router->get('cart', 'CartController::showCart');
$router->get('checkout', 'OrderController::checkout');
$router->get('orders', 'OrderController::showOrders');
$router->get('orderHistory', 'OrderController::showOrderHistory');

$router->post('ProductController::addProduct');
$router->post('ProductController::editProduct');
$router->post('UserController::newUser');
$router->post('UserController::loginUser');
$router->post('CartController::add');
$router->post('CartController::remove');

$router->fire();
