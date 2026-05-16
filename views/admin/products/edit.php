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
    <title>Edit Product - Admin</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Product</h2>

        <?php
        if(isset($_SESSION['product_error'])) {
             echo "<p style='color:red'>" . $_SESSION['product_error'] . "</p>";
            unset($_SESSION['product_error']);
        }
        ?>

        <form method="POST" action="../public/index.php?action=edit_product_submit" enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">

            <label>Product Name:</label>
            <input type="text" name="name" value="<?php echo $product['product_name']; ?>" required> <br><br>

            <label>Description:</label>
            <textarea name="description"><?php echo $product['product_description']; ?></textarea> <br><br>

            <label>Size Chart:</label>
            <textarea name="size_chart"><?php echo $product['product_size_chart']; ?></textarea> <br><br>

            <label>Price:</label>
            <input type="number" step="0.01" name="price" value="<?php echo $product['product_price']; ?>" required> <br><br>

            <label>Category ID:</label>
            <input type="number" name="category_id" value="<?php echo $product['product_category_id']; ?>" required> <br><br>

            <label>Stock:</label>
            <input type="number" name="stock" value="<?php echo $product['product_stock']; ?>" required> <br><br>

            <label>Gender:</label>
            <select name="gender" required>
                <option value="Men" <?php if($product['product_gender'] == 'Men') echo 'selected'; ?>>Men</option>
                <option value="Women" <?php if($product['product_gender'] == 'Women') echo 'selected'; ?>>Women</option>
            </select> <br><br>

            <label>Product Image:</label>
            <input type="file" name="image">
            <?php if($product['product_image_path']) { ?>
                <p>Current Image: <?php echo $product['product_image_path']; ?></p>
            <?php } ?>
            <br>

            <input type="submit" value="Update Product">
        </form>

        <br>
        <a href="../public/index.php?action=product_list">Back to product list</a>
    </div>
</body>
</html>