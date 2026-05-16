<?php
    // session_start();
    require_once('../utils/auth_helper.php');
    require_admin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Admin</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="container">
        <center>
            <h2>Add new product</h2>

            <?php
                if(isset($_SESSION['product_error'])) {
                    echo "<p style='color:red'>" . $_SESSION['product_error'] . "</p>";
                    unset($_SESSION['product_error']);
                }
            ?>

            <form method="POST" action="../public/index.php?action=create_product_submit" enctype="multipart/form-data">
                <label>Product name:</label>
                <input type="text" name="name" required> <br><br>

                <label>Description:</label>
                <textarea name="description"></textarea> <br><br>

                <label>Size chart:</label>
                <textarea name="size_chart" placeholder="S, M, L, XL"></textarea> <br><br>

                <label>Price:</label>
                <input type="number" step="0.01" name="price" required> <br><br>
                <!-- User can enter decimals like 19.99, 25.50, 100.75 with step="0.01" -->

                <label>Category ID:</label>
                <input type="number" name="category_id" required> <br><br>

                <label>Stock:</label>
                <input type="number" name="stock" required> <br><br>

                <label>Gender:</label>
                <select name="gender" required>
                    <option value="Men">Men</option>
                    <option value="Women">Women</option>
                </select> <br><br>

                <label>Product image:</label>
                <input type="file" name="image"> <br><br>

                <input type="submit" value="Add product">
            </form>

            <br>
            <a href="../public/index.php?action=product_list">Back to product list</a>
        </center>
        
    </div>
</body>
</html>