<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>

    <?php if($_SESSION['user_type'] == 'admin'): ?>
        <nav>
            <a href="addNewProduct">Add new product</a>
            <a href="profile">Go back</a>
        </nav>

        <ul>
            <?php foreach($products as $product): ?>
                <li>
                <?php echo $product->prod_name; ?><br>
                &#8369;<?php echo $product->unit_price; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <nav>
            <li><a href="/">Home</a></li>
            <li><a href="products">Products</a></li>
            <li><a href="#">About</a></li>
            <li><a href="cart">Cart</a></li>
        </nav>

        <ul>
            <?php foreach($products as $product): ?>
                <li>
                <?php echo $product->prod_name; ?><br>
                &#8369;<?php echo $product->unit_price; ?>
                </li>
                <form action="products" method="POST">
                    <input type="submit" name="add_to_cart" value="Add to cart">
                    <input type="hidden" name="prod_id" value="<?php echo $product->id; ?>">
                </form>
            <?php endforeach; ?>
        </ul>
    <?php endif;?>
</body>
</html>