<?php

namespace Epoch\Controllers;

class NavController
{
    /**
     * Display homepage
     */
    function showHome()
    {
        return view('home');
    }
    /**
     * Display login/signup page
     */
    function showLoginSignup()
    {
        return view('loginSignup');
    }
    /**
     * Display add new product page
     */
    function showAddNewProduct()
    {
        return view('addNewProduct');
    }
    /**
     * Display edit product page
     */
    function showEditProduct()
    {
        return view('editProduct');
    }
}