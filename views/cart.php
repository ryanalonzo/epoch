<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
</head>
<body>
    <h1>Cart</h1>
    <?php
    use Epoch\Models\Product;

    $items = array_count_values($_SESSION['cart']);

    foreach($items as $key => $item) {
        $product = new Product;
        $match = $product->where('id', $key)
                ->get();
        foreach($match as $m) {
            echo $m->prod_name . ' unit price: ' . $m->unit_price.  ' quantity: ' . $item . '<br>';
            $total += $m->unit_price * $item;
        }
    }
    ?>
    <br>
    <?php echo 'Total Price: ';?>&#8369;<?php echo $total ;?>
</body>
</html>