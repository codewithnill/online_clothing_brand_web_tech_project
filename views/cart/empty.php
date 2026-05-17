<?php
    require_once('../utils/auth_helper.php');
    require_customer();
?>

<html lang="en">
<head>
    <title>Empty Cart</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="container">
        <center>
            <h2>Your cart is empty</h2>
            <p>Please add products to your cart.</p>
            <a href="../public/index.php?action=home">Continue shopping</a>
        </center>
    </div>
</body>
</html>
