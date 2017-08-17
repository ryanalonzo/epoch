<?php

namespace Epoch\Controllers;

use Epoch\Models\Product;

class ProductController
{
    function showProducts()
    {
        $product = new Product;

        $products = $product->all();

        return view('products', ['products' => $products]);
    }
}