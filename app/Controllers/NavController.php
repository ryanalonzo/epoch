<?php

namespace Epoch\Controllers;

use Epoch\Models\Customer;

class NavController
{
    function showHome()
    {
        return view('home');
    }

    function showSignup()
    {
        return view('signup');
    }

    function showLogin()
    {
        return view('login');
    }
}