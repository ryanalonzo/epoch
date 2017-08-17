<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <h1>Home</h1>

    <?php if(!isset($_SESSION['username'])): ?>
        <ul>
            <li><a href="login">Login</a></li>
            <li><a href="signup">Sign up</a></li>
        </ul>
    <?php else: ?>
        <ul>
            <li><a href="profile">Profile</a></li>
            <li><a href="logout">Logout</a></li>
        </ul>
    <?php endif; ?>
</body>
</html>