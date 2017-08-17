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

    function addProduct()
    {
        if(isset($_POST['add'])) {

            $product = new Product;

            $input = [
                'prod_name' => $_POST['prod_name'],
                'unit_price' => $_POST['unit_price'],
                'stocks' => $_POST['stocks']
            ];

            $match = $product->where('prod_name', $input['prod_name'])
                  ->get();

            if($match) {
                echo "Product already exists. <a href=addNewProduct>Go back</a>";
                exit;
            } else {
                $product->create($input);
            }
        }
    }
}