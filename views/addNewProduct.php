<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Product</title>
</head>
<body>
    <h1>Add New Product</h1>

    <form action="products" method="POST" enctype="multipart/form-data">
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
                <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
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