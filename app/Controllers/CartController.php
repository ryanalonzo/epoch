<?php

namespace Epoch\Controllers;

use Epoch\Models\Product;

class CartController
{
    /**
     * Display all items in cart
     * @return uri, array
     */
    function showCart()
    {
        $items = array_count_values($_SESSION['cart']);

        return view('cart', [
            'items' => $items
        ]);
    }
    /**
     * Add items to cart
     */
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
    /**
     * Remove item/s from cart
     */
    function remove()
    {
        if(isset($_POST['remove'])) {
            $cartID = $_POST['cart_id'];
            $_SESSION['cart'] = array_values(array_diff($_SESSION['cart'],array($cartID)));

            header('Location: cart');
        }
    }
}