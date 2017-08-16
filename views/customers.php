<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customers</title>
</head>
<body>
    <h1>Customers</h1>
    <ul>
        <?php foreach($customers as $customer): ?>
            <li><?php echo $customer->customer_name; ?></li>
        <?php endforeach?>
    </ul>

</body>
</html>