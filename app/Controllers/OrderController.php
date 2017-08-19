<?php

namespace Epoch\Controllers;

use Epoch\Models\Order;
use Epoch\Models\OrderDetails;

class OrderController
{
    function checkout()
    {
        $order = new Order;
        $pdo = $order->make();

        $id = $_SESSION['id'];
        $date = date('Y-m-d H:i:s');

        $input = [
            'customer_id' => $id,
            'order_date'  => $date
        ];

        $order->create($input);

        $od = new OrderDetails;

        $orderID = $pdo->lastInsertId();

        $orderDetails = $_SESSION['order_details'];

        foreach($orderDetails as $detail) {
            $input = [
                'product_id'   => $detail['prod_id'],
                'order_id'  => $orderID,
                'quantity'  => $detail['quantity'],
                'price'     => $detail['total']
            ];
            $od->create($input);
        }

        $_SESSION['cart'] = [];

        return view('checkout');
    }
}