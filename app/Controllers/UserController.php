<?php

namespace Epoch\Controllers;

use Epoch\Models\User;

class UserController
{
    function newUser()
    {
        if(isset($_POST['signup'])) {

            $u = new User;

            $input = [
                'first_name' => htmlentities($_POST['first_name'], ENT_QUOTES),
                'last_name' => htmlentities($_POST['last_name'], ENT_QUOTES),
                'middle_name' => htmlentities($_POST['middle_name'], ENT_QUOTES),
                'email' => htmlentities($_POST['email'], ENT_QUOTES),
                'phone_number' => htmlentities($_POST['phone_number'], ENT_QUOTES),
                'username' => htmlentities($_POST['username'], ENT_QUOTES),
                'password' => htmlentities(password_hash($_POST['password'], PASSWORD_DEFAULT), ENT_QUOTES),
                'address' => htmlentities($_POST['address'], ENT_QUOTES)
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

            $username = htmlentities($_POST['username'], ENT_QUOTES);
            $password = htmlentities($_POST['password'], ENT_QUOTES);

            $result = $u->where('username', $username)
                        ->andWhere('password', $password)
                        ->get();

            if(count($result)) {
                foreach($result as $res) {
                    $id = $res->id;
                    $username = $res->username;
                    $user_type = $res->user_type;
                    $pass = $res->password;

                    if(password_verify($password, $pass)) {
                        $_SESSION['id'] = $id;
                        $_SESSION['username'] = $username;
                        $_SESSION['user_type'] = $user_type;
                    }
                }
            } else {
                echo "<script>alert('User not found.');window.location='loginSignup'</script>";
                exit;
            }
        }
    }
}