<?php

namespace Epoch\Controllers;

class NavController
{
    function showHome()
    {
        return view('home');
    }

    function showLoginSignup()
    {
        return view('loginSignup');
    }

    function showAddNewProduct()
    {
        return view('addNewProduct');
    }

    function showEditProduct()
    {
        return view('editProduct');
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