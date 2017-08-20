<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/main.css">
    <script src="https://use.fontawesome.com/d3f0a5537e.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <title>Home</title>
</head>
<body>
    <header class="clear-fix">
        <div class="container">
            <div class="contact pull-left clear-fix">
                <h3 class="pull-left">CONTACT</h3>
                <div class="fb-logo pull-left">
                    <img src="/images/media.png" alt="">
                </div>
                <div class="insta-logo pull-left">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </div>
            </div>
            <div class="logo-main pull-left">
                <h1>EPOCH | WATCHES</h1>
                <p class="pull-right">TIME WILL ALWAYS FOLLOW</p>
            </div>
            <div class="account pull-right">
                <?php if(!isset($_SESSION['username'])): ?>
                    <ul>
                        <li class="pull-left"><a href="login">LOGIN</a></li>
                        <li><a href="signup">SIGN UP</a></li>
                    </ul>
                <?php else: ?>
                    <ul>
                        <li class="pull-left">USER: <?php echo $_SESSION['username']; ?></li>
                        <li><a href="logout">LOGOUT</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <div class="container">
        <?php if($_SESSION['user_type'] == 'admin'): ?>
            <nav class="clear-fix">
                <ul>
                    <li class="pull-left"><a href="/">HOME</a></li>
                    <li class="pull-left"><a href="products">PRODUCTS</a></li>
                    <li class="pull-left"><a href="users">USERS</a></li>
                    <li><a href="orders">ORDERS</a></li>
                </ul>
            </nav>
        <?php else: ?>
            <nav class="clear-fix">
                <div class="nav-inner">
                    <ul>
                        <li class="pull-left"><a href="/">HOME</a></li>
                        <li class="pull-left"><a href="products">SHOP</a></li>
                        <li class="pull-left"><a href="#">ABOUT</a></li>
                        <li><a href="cart">CART</a></li>
                    </ul>
                </div>
            </nav>
        <?php endif; ?>

        <div class="space">

        </div>
    </div>
</body>
</html>