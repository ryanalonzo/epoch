<?php

require_once('../vendor/autoload.php');

$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

$router = new \Epoch\Router($_SERVER['REQUEST_URI']);

$router->get('', 'NavController::showHome');
$router->get('customers', 'CustomerController::get');
$router->get('signup', 'NavController::showSignup');
$router->get('login', 'NavController::showLogin');

$router->fire();