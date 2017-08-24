<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/orders.css">
    <script src="https://use.fontawesome.com/d3f0a5537e.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <title>Orders</title>
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
    <?php else: ?>
       <?php header('Location: /'); ?>
    <?php endif; ?>
    <table>
        <thead>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Customer Name</th>
            <th>Address</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
        </thead>
        <tbody>
            <?php foreach($orders as $order): ?>
                <tr>
                    <td><?php echo $order->order_id; ?></td>
                    <td><?php echo $order->order_date;?></td>
                    <td><?php echo $order->first_name . ' ' . $order->last_name; ?></td>
                    <td><?php echo $order->address; ?></td>
                    <td><?php echo $order->prod_name; ?></td>
                    <td><?php echo $order->quantity; ?></td>
                    <td><?php echo $order->price; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="space"></div>

    <footer>
        <div class="container">
            <p>Epoch Watches<br>&copy;2017</p>
        </div>
    </footer>
</body>
</html>