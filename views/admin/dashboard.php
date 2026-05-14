<?php
    session_start();
    require_once('../../utils/auth_helper.php');
    require_admin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Online Clothing Brand</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <p>Welcome, <?php echo $_SESSION['user_name']; ?>!</p>
        
        <hr>
        
        <h3>Summary</h3>
        <ul>
            <li>Total Products: <?php echo $total_products; ?></li>
            <li>Total Customers: <?php echo $total_customers; ?></li>
            <li>Total Orders: <?php echo $total_orders; ?></li>
            <li>Pending Orders: <?php echo $pending_orders; ?></li>
        </ul>
        
        <hr>
        
        <h3>Manage</h3>
        <ul>
            <li><a href="../../public/index.php?action=product_list">Manage Products</a></li>
            <li><a href="../../public/index.php?action=customer_list">Manage Customers</a></li>
            <li><a href="../../public/index.php?action=order_list">Manage Orders</a></li>
            <li><a href="../../public/index.php?action=purchase_history">View All Purchase History</a></li>
        </ul>
        
        <br>
        <a href="../../public/index.php?action=home">Back to Home</a> |
        <a href="../../public/index.php?action=logout">Logout</a>
    </div>
</body>
</html>