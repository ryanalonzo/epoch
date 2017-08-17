<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body>
    <?php if($_SESSION['user_type'] == 'admin'): ?>
        <h1>Welcome <?php echo 'Admin: ' . $_SESSION['username']; ?></h1>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="products">Products</a></li>
            </ul>
        </nav>
    <?php else: ?>
        <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="products">Products</a></li>
                <li><a href="about">About</a></li>
                <li><a href="cart">Cart</a></li>
            </ul>
        </nav>
    <?php endif; ?>


</body>
</html>