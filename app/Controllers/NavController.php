<?php

namespace Epoch\Controllers;

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

    function showProfile()
    {
        return view('profile');
    }

    function showAddNewProduct()
    {
        return view('addNewProduct');
    }

    function verify()
    {
        return view('verify');
    }

    function logout()
    {
        session_destroy();

        return header("Location: /");
    }
}