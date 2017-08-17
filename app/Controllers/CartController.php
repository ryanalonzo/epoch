<?php

namespace Epoch\Controllers;

use Epoch\Models\Product;

class CartController
{
    function showCart()
    {
        $items = array_count_values($_SESSION['cart']);
        return view('cart', [
            'items' => $items
        ]);
    }

    function add()
    {
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if(isset($_POST['add_to_cart'])) {
            $product = new Product;

            $id = $_POST['prod_id'];

            $res = $product->where('id', $id)
                    ->get();

            array_push($_SESSION['cart'], $id);
        }
    }
}