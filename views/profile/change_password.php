<?php
    // session_start();
    require_once('../utils/auth_helper.php');

    require_login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - Online Clothing Brand</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="container">
        <center>
        
            <h2>Change Password</h2>

            <?php
                if(isset($_SESSION['password_error'])) {
                    // echo "<p>" . $_SESSION['password_error'] . "</p>";
                    echo "<p style='color:red'>" . $_SESSION['password_error'] . "</p>";
                    unset($_SESSION['password_error']);
                }
            ?>

            <form id="change_password_form" method="POST" action="../public/index.php?action=update_password">
                <label>Current Password:</label>
                <input type="password" name="current_password" required> <br><br>

                <label>New Password:</label>
                <input type="password" name="new_password" required> <br><br>

                <label>Confirm New Password:</label>
                <input type="password" name="confirm_password" required> <br><br>

                <input type="submit" value="Change Password">
            </form>

            <br>
            <a href="index.php?action=profile">Back to Profile</a>
        </center>
    </div>

    <script src="../public/js/auth.js"></script>
    <script>
        document.getElementById('change_password_form').onsubmit = validateChangePasswordForm;
    </script>
</body>
</html>