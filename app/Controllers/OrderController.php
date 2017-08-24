<?php

namespace Epoch\Controllers;

use Epoch\Models\Order;
use Epoch\Models\OrderDetails;
use Epoch\Models\Product;

class OrderController
{
    /**
     * Display all placed orders
     */
    function showOrders()
    {
        $order = new Order;

        $orders = $order->table('users')
           ->join('orders', 'users.id', 'orders.customer_id')
           ->join('order_details', 'orders.id', 'order_details.order_id')
           ->join('products', 'order_details.product_id', 'products.id')
           ->select(['first_name', 'last_name', 'address', 'order_date', 'quantity', 'order_id','price', 'prod_name']);

        return view('orders', [
            'orders' => $orders
        ]);
    }
    /**
     * Display order history page per user
     */
    function showOrderHistory()
    {
        $order = new Order;

        $orders = $order->table('users')
           ->join('orders', 'users.id', 'orders.customer_id')
           ->join('order_details', 'orders.id', 'order_details.order_id')
           ->join('products', 'order_details.product_id', 'products.id')
           ->where('users.id', $_SESSION['id'])
           ->select(['first_name', 'last_name', 'address', 'order_date', 'quantity', 'order_id','price', 'prod_name']);

        return view('orderHistory', [
            'orders' => $orders
        ]);
    }
    /**
     * Save orders and update products quantity
     * @return [type] [description]
     */
    function checkout()
    {
        $order = new Order;
        $pdo = $order->make();

        $id = $_SESSION['id'];
        $date = date('Y-m-d');

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

            $p = new Product;

            $product = $p->where('id', $detail['prod_id'])
              ->get();

            foreach($product as $prod) {
                $newQuantity = $prod->stocks - $detail['quantity'];
            }

            $p->update(['stocks' => $newQuantity],$detail['prod_id']);
        }

        $_SESSION['cart'] = [];

        return view('checkout');
    }
}