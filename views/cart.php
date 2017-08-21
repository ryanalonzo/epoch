<?php

use Epoch\Models\Product;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/cart.css">
    <script src="https://use.fontawesome.com/d3f0a5537e.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <title>Cart</title>
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
                        <li>USER: <?php echo $_SESSION['user_type'];?></li>
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
        <?php header('location: /'); ?>
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

    <?php if(count($_SESSION['cart'])): ?>
        <div class="cart-table">
            <table>
                <thead>
                    <th>IMAGE</th>
                    <th>PRODUCT NAME</th>
                    <th>UNIT PRICE</th>
                    <th>QUANTITY</th>
                    <th>TOTAL</th>
                    <th>ACTION</th>
                </thead>
                <tbody>
                    <?php foreach($items as $key => $item):
                        $product = new Product;

                        $match = $product->where('id', $key)
                                ->get();

                        foreach($match as $m) : ?>
                            <tr>
                                <td class="td-image">
                                    <div>
                                        <img src="/images/products/<?php echo $m->image_src; ?>" alt="">
                                    </div>
                                </td>
                                <td><?php echo $m->prod_name; ?></td>
                                <td><?php echo $m->unit_price; ?></td>
                                <td><?php echo $item; ?></td>
                                <?php
                                    $total = $m->unit_price * $item;
                                ?>
                                <td><?php echo $total; ?></td>
                                <td>
                                    <form action="cart" method="POST">
                                        <input type="submit" name="remove" value="Remove">
                                        <input type="hidden" name="cart_id" value="<?php echo $key?>">
                                    </form>
                                </td>
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
                    <tr>
                       <td colspan="6">
                            <p>Total Price: &#8369;<?php echo $totalPrice; ?></p>
                            <button>
                                <a href="checkout">Checkout</a>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    <?php elseif(isset($_SESSION['user_type'])): ?>
        <div class="container">
            <div class="empty">
                <h1>EMPTY CART</h1>
                <button><a href="products">Shop Now!</a></button>
            </div>
        </div>
    <?php else: ?>
        <div class="container">
            <div class="empty">
                <h1>EMPTY CART</h1>
                <button><a href="loginSignup">Please login or signup to continue</a></button>
            </div>
        </div>
    <?php endif; ?>

    <div class="space"></div>
</body>
</html>