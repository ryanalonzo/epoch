<?php

namespace Epoch\Controllers;

use Epoch\Models\User;

class UserController
{
    function showUsers()
    {
        if($_SESSION['user_type'] == 'admin') {
            $u = new User;

            $users = $u->all();

            return view('users', [
                'users' => $users
            ]);
        }
    }

    function newUser()
    {
        if(isset($_POST['signup'])) {

            $u = new User;

            $input = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'middle_name' => $_POST['middle_name'],
                'email' => $_POST['email'],
                'phone_number' => $_POST['phone_number'],
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
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
                    $u->create($input);
                }
            }
        }
    }

    function loginUser()
    {
        if(isset($_POST['login'])) {

            $u = new User;

            $username = $_POST['username'];
            $password = $_POST['password'];

            $result = $u->where('username', $username)
                      ->get();

            foreach($result as $res) {
                $id = $res->id;
                $username = $res->username;
                $user_type = $res->user_type;
                $pass = $res->password;

                if(password_verify($password, $pass)) {
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;
                    $_SESSION['user_type'] = $user_type;
                } else {
                    echo "User not found. <a href=login>Go back.</a>";
                    exit;
                }
            }
        }
    }
}