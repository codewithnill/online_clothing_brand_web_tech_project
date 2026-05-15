<?php
    //session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Online Clothing Brand</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
    <div class="container">
        <center>
            <h2>Login</h2>
            
            <?php
                if(isset($_SESSION['login_error'])) {
                    echo "<p>" . $_SESSION['login_error'] . "</p>";
                    unset($_SESSION['login_error']);
                }
            ?>
            
            <form method="POST" action="../../public/index.php?action=login_submit">
                <label>Email:</label>
                <input type="email" name="email" required> <br><br>
                
                <label>Password:</label>
                <input type="password" name="password" required> <br><br>
                
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label> <br><br>
                
                <input type="submit" value="Login">
            </form>
            
            <p>Don't have an account? <a href="index.php?action=register">Sign up now.</a></p>
        </center>
    </div>
</body>
</html>