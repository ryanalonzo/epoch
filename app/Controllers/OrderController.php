<?php

namespace Epoch\Controllers;

use Epoch\Models\Order;

class OrderController
{
    function checkout()
    {
        $order = new Order;

        $id = $_SESSION['id'];
        $date = date('Y-m-d H:i:s');

        $input = [
            'customer_id' => $id,
            'order_date'  => $date
        ];

        $o = $order->create($input);

        $_SESSION['cart'] = [];

        return view('checkout');
    }
}