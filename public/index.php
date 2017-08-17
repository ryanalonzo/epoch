<?php

session_start();

require_once('../vendor/autoload.php');

$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

$router = new \Epoch\Router($_SERVER['REQUEST_URI']);

$router->get('', 'NavController::showHome');
$router->get('profile', 'NavController::showProfile');
$router->get('signup', 'NavController::showSignup');
$router->get('login', 'NavController::showLogin');
$router->get('logout', 'NavController::logout');
$router->get('addNewProduct', 'NavController::showAddNewProduct');
$router->get('products', 'ProductController::showProducts');

$router->post(function($p)
{
    if(isset($_POST['add'])) {
            $input = [
                'prod_name' => $_POST['prod_name'],
                'unit_price' => $_POST['unit_price'],
                'stocks' => $_POST['stocks']
            ];

            $match = $p->where('prod_name', $input['prod_name'])
                  ->get();

            if($match) {
                echo "Product already exists. <a href=addNewProduct>Go back</a>";
                exit;
            } else {
                $p->create($input);
            }
        }
});

$router->post(function($u)
{
    if(isset($_POST['signup'])) {

        $input = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'middle_name' => $_POST['middle_name'],
            'email' => $_POST['email'],
            'phone_number' => $_POST['phone_number'],
            'username' => $_POST['username'],
            'password' => md5($_POST['password']),
            'address' => $_POST['address']
        ];

        if(!empty($input['first_name']) && !empty($input['last_name']) &&
            !empty($input['email']) && !empty($input['phone_number'])) {

            $match = $u->where('username', $input['username'])
              ->get();

            if(count($match)) {
                // To be replaced by an alert box.
                echo 'Username is already taken.';
            } else {
                return $u->create($input);
            }
        }
    }
});

$router->post(function($u)
{
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if(isset($_POST['login'])) {
        $result = $u->where('username', $username)
                  ->andWhere('password', $password)
                  ->get();

        if(count($result)) {
            foreach($result as $res) {
                $username = $res->username;
                $user_type = $res->user_type;
            }

            $_SESSION['username'] = $username;
            $_SESSION['user_type'] = $user_type;

            return true;
        } else {
            echo "User not found. <a href=/>Go back</a>";
            exit;
        }
    }
});

$router->fire();