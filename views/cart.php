<?php

use Epoch\Models\Product;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
</head>
<body>
    <h1>Cart</h1>

    <?php if(count($_SESSION['cart'])): ?>
        <table>
            <thead>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </thead>
            <tbody>
                <?php foreach($items as $key => $item):
                    $product = new Product;

                    $match = $product->where('id', $key)
                            ->get();

                    foreach($match as $m) : ?>
                        <tr>
                            <td><?php echo $m->prod_name; ?></td>
                            <td><?php echo $m->unit_price; ?></td>
                            <td><?php echo $item; ?></td>
                            <?php
                                $total = $m->unit_price * $item;
                            ?>
                            <td><?php echo $total; ?></td>
                            <?php $totalPrice += $m->unit_price * $item; ?>
                        </tr>
                        <?php
                            if(!isset($ar)) {
                                $ar = [];
                            }
                            $od = ['prod_id' => $m->id, 'quantity' => $item, 'total' => $total];
                            array_push($ar, $od);
                            $_SESSION['order_details'] = $ar;
                        ?>
                    <?php endforeach; ?>
                <?php endforeach;?>

            </tbody>
        </table>
        <p>Total Price: &#8369;<?php echo $totalPrice; ?></p>
        <br>
        <a href="checkout">Checkout</a>
    <?php else: ?>
        <h2>Empty Cart</h2>
        <a href="products">Order now!</a>
    <?php endif; ?>
</body>
</html>