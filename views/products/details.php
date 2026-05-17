<?php
    require_once('../utils/auth_helper.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="container">
        <center>
            <?php if($product == null) { ?>
                <h2>Product not found</h2>
                <a href="../public/index.php?action=home">Back to home</a>
            <?php } else { ?>
                <h2><?php echo $product['product_name']; ?></h2>
                
                <?php if(!empty($product['product_image_path'])) { ?>
                    <img src="<?php echo $product['product_image_path']; ?>" alt="<?php echo $product['product_name']; ?>" width="200">
                <?php } ?>
                
                <p><b>Description:</b> <?php echo $product['product_description']; ?></p>
                <p><b>Size chart:</b> <?php echo $product['product_size_chart']; ?></p>
                <p><b>Price:</b> <?php echo $product['product_price']; ?></p>
                <p><b>Stock:</b> <?php echo $product['product_stock']; ?></p>
                <p><b>Gender:</b> <?php echo $product['product_gender']; ?></p>
                
                <?php if(is_customer()) { ?>
                    <form id="addCartForm">
                        <input type="hidden" name="product_id" id="product_id" value="<?php echo $product['product_id']; ?>">
                        <label>Quantity:</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1">
                        <input type="submit" value="Add to cart">
                    </form>
                    <p id="cartMessage"></p>
                <?php } else { ?>
                    <p><a href="../public/index.php?action=login">Login as customer to add to cart</a></p>
                <?php } ?>
                
                <br>
                <a href="../public/index.php?action=home">Back to home</a>
            <?php } ?>
        </center>
    </div>
    
    <script src="../public/js/cart.js"></script>
</body>
</html>
