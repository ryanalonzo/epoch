<?php

namespace Epoch\Controllers;

use Epoch\Models\User;

class RegisterController
{
    protected $data;

    function __construct($data)
    {
        $this->data = $data;
    }

    function register()
    {
        $user = new User;
        $data = $this->data;

        $input = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'middle_name' => $data['middle_name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'username' => $data['username'],
            'password' => $data['password'],
            'address' => $data['address']
        ];
        $user->create($input);
    }
}