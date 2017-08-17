<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Product</title>
</head>
<body>
    <h1>Add New Product</h1>

    <form action="products" method="POST">
        <table>
            <tr>
                <td><input type="text" name="prod_name" placeholder="Product Name"></td>
            </tr>
            <tr>
                <td><input type="text" name="unit_price" placeholder="Price"></td>
            </tr>
            <tr>
                <td><input type="text" name="stocks" placeholder="Stocks"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="add" value="Save">
                    <button>
                        <a href='products'>Back</a>
                    </button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>