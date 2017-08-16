<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
</head>
<body>
    <h1>Sign up</h1>

    <form action="/" method="POST">
        <table>
            <tr>
                <td><input type="text" name="first_name" placeholder="First Name"></td>
            </tr>
            <tr>
                <td><input type="text" name="last_name" placeholder="Last Name"></td>
            </tr>
            <tr>
                <td><input type="text" name="middle_name" placeholder="Middle Name"></td>
            </tr>
            <tr>
                <td><input type="text" name="email" placeholder="Email"></td>
            </tr>
            <tr>
                <td><input type="text" name="phone_number" placeholder="Phone Number"></td>
            </tr>
            <tr>
                <td><input type="text" name="username" placeholder="Username"></td>
            </tr>
            <tr>
                <td><input type="text" name="password" placeholder="Password"></td>
            </tr>
            <tr>
                <td><textarea name="address" placeholder="Address"></textarea>
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
</body>
</html>