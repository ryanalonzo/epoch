<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>
    <nav>
        <?php if($_SESSION['user_type'] == 'admin'): ?>
            <a href="addNewProduct">Add new product</a>
            <a href="profile">Go back</a>
        <?php endif;?>
    </nav>
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