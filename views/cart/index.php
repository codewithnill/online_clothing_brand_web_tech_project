<?php
    require_once('../utils/auth_helper.php');
    require_customer();
?>

<html lang="en">
<head>
    <title>Cart</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="container">
        <center>
            <h2>My cart</h2>
            <p id="cartMessage"></p>
            
            <table border="1" cellpadding="10">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                <?php foreach($cart_items as $item) { ?>
                <tr id="cart_row_<?php echo $item['cart_product_id']; ?>">
                    <td><?php echo $item['product_name']; ?></td>
                    <td><?php echo $item['product_price']; ?></td>
                    <td>
                        <input type="number" class="cartQty" data-product="<?php echo $item['cart_product_id']; ?>" value="<?php echo $item['cart_quantity']; ?>" min="1">
                    </td>
                    <td><?php echo $item['product_price'] * $item['cart_quantity']; ?></td>
                    <td>
                        <button type="button" class="removeCart" data-product="<?php echo $item['cart_product_id']; ?>">Remove</button>
                    </td>
                </tr>
                <?php } ?>
            </table>
            
            <h3>Total: <?php echo $cart_total; ?></h3>
            
            <br>
            <a href="../public/index.php?action=home">Continue shopping</a>
        </center>
    </div>
    
    <script src="../public/js/cart.js"></script>
</body>
</html>
