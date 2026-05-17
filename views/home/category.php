<?php
    // session_start();
    require_once('../utils/auth_helper.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($category['category_name']); ?> - Online Clothing Brand</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="container">
        <center>
            <h2><?php echo htmlspecialchars($category['category_name']); ?></h2>

            <p>
                <a href="../public/index.php?action=home">Home</a>
                <?php if (is_logged_in()) { ?>
                    &nbsp;|&nbsp; <a href="../public/index.php?action=profile">Profile</a>
                    &nbsp;|&nbsp; <a href="../public/index.php?action=cart">Cart</a>
                    &nbsp;|&nbsp; <a href="../public/index.php?action=logout">Logout</a>
                <?php } else { ?>
                    &nbsp;|&nbsp; <a href="../public/index.php?action=login">Login</a>
                    &nbsp;|&nbsp; <a href="../public/index.php?action=register">Register</a>
                <?php } ?>
            </p>

            <hr>

            <?php if (empty($products)) { ?>
                <p>No products found in this category.</p>
            <?php } else { ?>

                <table border="1" cellpadding="10">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($products as $product) { ?>
                    <tr>
                        <td>
                            <?php if (!empty($product['product_image_path'])) { ?>
                                <img src="../public/<?php echo htmlspecialchars($product['product_image_path']); ?>"
                                     alt="<?php echo htmlspecialchars($product['product_name']); ?>"
                                     width="80" height="80" style="object-fit:cover;">
                            <?php } else { ?>
                                <em>No image</em>
                            <?php } ?>
                        </td>
                        <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                        <td>৳ <?php echo number_format($product['product_price'], 2); ?></td>
                        <td>
                            <?php if ($product['product_stock'] > 0) { ?>
                                <?php echo $product['product_stock']; ?>
                            <?php } else { ?>
                                <span style="color:red;">Out of stock</span>
                            <?php } ?>
                        </td>
                        <td><?php echo htmlspecialchars($product['product_gender']); ?></td>
                        <td>
                            <!-- Product detail link (handled by Task 2 )-->
                            <a href="../public/index.php?action=product_detail&id=<?php echo $product['product_id']; ?>">View Details</a>
                            <?php if (is_logged_in() && is_customer()) { ?>
                                &nbsp;|&nbsp;
                                <a href="../public/index.php?action=add_to_cart&product_id=<?php echo $product['product_id']; ?>">Add to Cart</a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            <?php } ?>

            <br>
            <a href="../public/index.php?action=home">Back to Home</a>

        </center>
    </div>
</body>
</html>