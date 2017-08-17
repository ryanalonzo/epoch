<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <h1>Home</h1>

    <?php if(!isset($_SESSION['username'])): ?>
        <a href="login">Login</a>
        <a href="signup">Sign up</a>
    <?php else: ?>
        <a href="profile">Profile</a>
        <a href="logout">Logout</a>
    <?php endif; ?>
</body>
</html>