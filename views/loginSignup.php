<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/loginSignup.css">
    <script src="https://use.fontawesome.com/d3f0a5537e.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <title>Login/Signup</title>
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

    <div class="container">
        <div class="login pull-left">
            <form action="/" method="POST">
            <h3>Login</h3>
                <table>
                    <tr>
                        <td><input type="text" name="username" placeholder="Username" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="password" placeholder="Password" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="login" value="Login"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="signup pull-right">
            <form action="loginSignup" method="POST" class="pull-right">
            <h3>Signup</h3>
                <table>
                    <tr>
                        <td><input type="text" name="first_name" placeholder="First Name" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="last_name" placeholder="Last Name" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="middle_name" placeholder="Middle Name" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="email" placeholder="Email" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="phone_number" placeholder="Phone Number" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="username" placeholder="Username" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="password" placeholder="Password" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td>
                            <textarea name="address" placeholder="Address" autocomplete="off"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="signup" value="Save">
                            <button>
                                <a href='/'>Back</a>
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <div class="space"></div>

    <footer>
        <div class="container">
            <p>Epoch Watches<br>&copy;2017</p>
        </div>
    </footer>
</body>
</html>