<?php

namespace Epoch\Controllers;

use Epoch\Models\Customer;

class CustomerController
{
    function get()
    {
        $customer = new Customer;

        $customers = $customer
            ->all();

        return view('customers', [
            'customers' => $customers
        ]);
    }
}