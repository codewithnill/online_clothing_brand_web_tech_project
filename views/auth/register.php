<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Online Clothing Brand</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>

        <?php
            if(isset($_SESSION['register_error'])) {
                echo "<p>" . $_SESSION['register_error'] . "</p>";
                unset($_SESSION['register_error']);
            }

            if(isset($_SESSION['register_errors'])) {
                foreach($_SESSION['register_errors'] as $err) {
                    echo "<p>" . $err . "</p>";
                }
                unset($_SESSION['register_errors']);
            }
        ?>

        <form method="POST" action="../../public/index.php?action=register_submit">
            <label>Name:</label>
            <input type="text" name="name" required> <br><br>

            <label>Email:</label>
            <input type="email" name="email" required> <br><br>

            <label>Password:</label>
            <input type="password" name="password" required> <br><br>

            <label>Role:</label>
            <select name="role">
                <option value="customer">Customer</option>
                <option value="admin">Admin</option>
            </select> <br><br>

            <label>Address:</label>
            <textarea name="address" required></textarea> <br><br>

            <label>Phone:</label>
            <input type="text" name="phone" required> <br><br>

            <input type="submit" value="Register">
        </form>

        <p>Already have an account? <a href="../../public/index.php?action=login">Login here</a></p>
    </div>
</body>
</html>