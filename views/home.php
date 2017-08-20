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
                        <li class="pull-right"><a href="loginSignup">LOGIN / SIGNUP</a></li>
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

    <?php if($_SESSION['user_type'] == 'admin'): ?>
        <nav class="clear-fix">
            <div class="container">
                <div class="nav-inner">
                    <ul>
                        <li class="pull-left"><a href="/">HOME</a></li>
                        <li class="pull-left"><a href="products">PRODUCTS</a></li>
                        <li class="pull-left"><a href="users">USERS</a></li>
                        <li class="pull-left"><a href="orders">ORDERS</a></li>
                        <li><a href="addNewProduct">ADD NEW</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    <?php else: ?>
        <nav class="clear-fix">
            <div class="container">
                <div class="nav-inner">
                    <ul>
                        <li class="pull-left"><div style="width: 1%; height: 1px;"></div></li>
                        <li class="pull-left"><a href="/">HOME</a></li>
                        <li class="pull-left"><a href="products">SHOP</a></li>
                        <li class="pull-left"><a href="#">ABOUT</a></li>
                        <li>
                            <?php if(count($_SESSION['cart'])): ?>
                                <a href="cart" style="color: red;">CART</a>
                            <?php else: ?>
                                <a href="cart">CART</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <?php endif; ?>
    <div class="banner">
        <div class="container">
            <img src="/images/2.jpg" alt="">
        </div>
    </div>







    <div class="space"></div>
</body>
</html>