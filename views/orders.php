<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders</title>
</head>
<body>
    <table>
        <thead>
            <th>Order ID</th>
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
                    <td><?php echo $order->first_name . ' ' . $order->last_name; ?></td>
                    <td><?php echo $order->address; ?></td>
                    <td><?php echo $order->prod_name; ?></td>
                    <td><?php echo $order->quantity; ?></td>
                    <td><?php echo $order->price; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>