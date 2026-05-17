<?php
    //session_start();
    if(isset($_SESSION['login_error'])) {
        echo "<center><p style='color:red'>" . $_SESSION['login_error'] . "</p></center>";
        unset($_SESSION['login_error']);
    }

    if(isset($_SESSION['register_success'])) {
        echo "<center><p>" . $_SESSION['register_success'] . "</p></center>";
        unset($_SESSION['register_success']);
    }   
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
            
            <form id="login_form" method="POST" action="index.php?action=login_submit">
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

    <script src="../public/js/auth.js"></script>
    <script>
        document.getElementById('login_form').onsubmit = validateLoginForm;
    </script>
</body>
</html>