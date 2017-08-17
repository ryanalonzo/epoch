<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>
    <ul>
        <?php foreach($products as $product): ?>
            <li>
            <?php echo $product->prod_name; ?><br>
            &#8369;<?php echo $product->unit_price; ?>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>