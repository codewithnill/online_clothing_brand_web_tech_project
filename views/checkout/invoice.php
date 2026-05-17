<?php
    // session_start();
    require_once('../utils/auth_helper.php');
    require_customer();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - Online Clothing Brand</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="container">
        <center>
            <h2>Order Invoice</h2>
            <p>Hello, <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong>. Please review your order before proceeding.</p>

            <?php if (isset($_SESSION['checkout_error'])) { ?>
                <p style="color:red;"><?php echo $_SESSION['checkout_error']; unset($_SESSION['checkout_error']); ?></p>
            <?php } ?>

            <table border="1" cellpadding="10">
                <tr>
                    <th>Sl no.</th>
                    <th>Product</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                <?php $i = 1; foreach ($cart_items as $item) { ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                    <td>৳ <?php echo number_format($item['product_price'], 2); ?></td>
                    <td><?php echo $item['cart_quantity']; ?></td>
                    <td>৳ <?php echo number_format($item['product_price'] * $item['cart_quantity'], 2); ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="4"><strong>Total</strong></td>
                    <td><strong>৳ <?php echo number_format($cart_total, 2); ?></strong></td>
                </tr>
            </table>

            <br>

            <a href="../public/index.php?action=cart">
                <button type="button">Cancel — Back to Cart</button>
            </a>
            &nbsp;&nbsp;
            <a href="../public/index.php?action=checkout_payment">
                <button type="button">Continue to Payment</button>
            </a>

            <br><br>
            <a href="../public/index.php?action=home">Back to home</a>
        </center>
    </div>
</body>
</html>