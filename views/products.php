<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/products.css">
    <script src="https://use.fontawesome.com/d3f0a5537e.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <title>Products</title>
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
                <?php if($_SESSION['user_type'] == 'admin'): ?>
                    <ul>
                        <li class="pull-left">USER: <?php echo $_SESSION['user_type'];?></li>
                        <li><a href="logout">LOGOUT</a></li>
                    </ul>
                <?php elseif($_SESSION['user_type'] == 'Customer'): ?>
                    <ul>
                        <li class="pull-left">USER: <?php echo $_SESSION['username']; ?></li>
                        <li><a href="logout">LOGOUT</a></li>
                    </ul>
                <?php else: ?>
                    <ul>
                        <li class="pull-right"><a href="loginSignup">LOGIN / SIGNUP</a></li>
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
                        <li class="pull-left"><div style="width: 1%; height: 1px;"></div></li>
                        <li class="pull-left"><a href="/">HOME</a></li>
                        <li class="pull-left"><a href="products">PRODUCTS</a></li>
                        <li class="pull-left"><a href="orders">ORDERS</a></li>
                        <li><a href="addNewProduct">ADD NEW</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    <?php elseif($_SESSION['user_type'] == 'Customer'): ?>
        <nav class="clear-fix">
            <div class="container">
                <div class="nav-inner">
                    <ul>
                        <li class="pull-left"><a href="/">HOME</a></li>
                        <li class="pull-left"><a href="products">SHOP</a></li>
                        <li class="pull-left"><a href="orderHistory">ORDER HISTORY</a></li>
                        <li class="pull-left"><a href="#">ABOUT</a></li>
                        <li>
                            <?php if(count($_SESSION['cart'])): ?>
                                <a href="cart">CART</a>[<span><?php echo count($_SESSION['cart']);?></span>]
                            <?php else: ?>
                                <a href="cart">CART</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <?php else: ?>
        <nav class="clear-fix">
            <div class="container">
                <div class="nav-inner">
                    <ul>
                        <li class="pull-left"><a href="/">HOME</a></li>
                        <li class="pull-left"><a href="products">SHOP</a></li>
                        <li class="pull-left"><a href="orderHistory">ORDER HISTORY</a></li>
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

    <div class="image-gallery">
        <div class="container">
            <?php foreach($products as $product):?>
                <?php if($product->stocks):?>
                    <div class="item pull-left">
                        <img src="/images/products/<?php echo $product->image_src;?>" >
                        <div class="desc">
                            <p class="pull-left"><?php echo $product->prod_name . ' &#8369;' . $product->unit_price;?></p><br>
                            <?php if($_SESSION['user_type'] == 'Customer'):?>
                                <form action="products" method="POST">
                                    <input type="submit" name="add_to_cart" value="ADD" class="pull-right">
                                    <input type="hidden" name="prod_id" value="<?php echo $product->id; ?>">
                                </form>
                            <?php elseif($_SESSION['user_type'] == 'admin'): ?>
                                    <form action="editProduct" method="POST">
                                        <input type="submit" name="edit" value="EDIT" class="pull-left">
                                        <input type="hidden" name="prod_id" value="<?php echo $product->id; ?>">
                                    </form>
                                    <form action="deleteProduct" method="POST">
                                <input type="submit" name="delete" value="DELETE" class="pull-right">
                                <input type="hidden" name="prod_id" value="<?php echo $product->id; ?>">
                            </form>
                            <?php endif;?>
                        </div>
                    </div>
                <?php elseif($_SESSION['user_type'] == 'admin'): ?>
                    <div class="item pull-left">
                        <img src="/images/products/<?php echo $product->image_src;?>" >
                        <div class="desc">
                            <p class="pull-left">
                                <?php echo $product->prod_name . ' &#8369;' . $product->unit_price;?>
                                <span>OUT OF STOCK</span>
                            </p>
                            <form action="editProduct" method="POST">
                                <input type="submit" name="edit" value="EDIT" class="pull-left">
                                <input type="hidden" name="prod_id" value="<?php echo $product->id; ?>">
                            </form>
                            <form action="deleteProduct" method="POST">
                                <input type="submit" name="delete" value="DELETE" class="pull-right">
                                <input type="hidden" name="prod_id" value="<?php echo $product->id; ?>">
                            </form>
                        </div>
                    </div>
                <?php endif;?>
            <?php endforeach; ?>
        </div>
    </div>

    <footer class="clear-fix">
        <div class="container">
            <p>Epoch Watches<br>&copy;2017</p>
        </div>
    </footer>
</body>
</html>