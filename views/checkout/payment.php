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
    <title>Payment - Online Clothing Brand</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <script src="../public/js/checkout.js" defer></script>
</head>
<body>
    <div class="container">
        <center>
            <h2>Select Payment Method</h2>
            <p>Order total: <strong>৳ <?php echo number_format($cart_total, 2); ?></strong></p>

            <?php if (isset($_SESSION['checkout_errors'])) { ?>
                <?php foreach ($_SESSION['checkout_errors'] as $err) { ?>
                    <p style="color:red;"><?php echo htmlspecialchars($err); ?></p>
                <?php } ?>
                <?php unset($_SESSION['checkout_errors']); ?>
            <?php } ?>

            <form method="POST" action="../public/index.php?action=place_order" id="payment-form">

                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? ''); ?>">

                <table border="1" cellpadding="12">
                    <tr>
                        <th>Method</th>
                        <th>Select</th>
                    </tr>
                    <tr>
                        <td>Credit Card</td>
                        <td><input type="radio" name="payment_method" value="Credit Card"></td>
                    </tr>
                    <tr>
                        <td>bKash</td>
                        <td><input type="radio" name="payment_method" value="bKash"></td>
                    </tr>
                    <tr>
                        <td>Nagad</td>
                        <td><input type="radio" name="payment_method" value="Nagad"></td>
                    </tr>
                    <tr>
                        <td>Bank Transfer</td>
                        <td><input type="radio" name="payment_method" value="Bank Transfer"></td>
                    </tr>
                    <tr>
                        <td>Cash on Delivery</td>
                        <td><input type="radio" name="payment_method" value="Cash on Delivery"></td>
                    </tr>
                </table>

                <!-- JS validation error shown here -->
                <p id="payment-error" style="color:red; display:none;">Please select a payment method.</p>

                <br>

                <a href="../public/index.php?action=checkout_invoice">
                    <button type="button">Back to Invoice</button>
                </a>
                &nbsp;&nbsp;
                <button type="submit" id="place-order-btn">Place Order</button>

            </form>

            <br>
            <a href="../public/index.php?action=home">Back to home</a>
        </center>
    </div>
</body>
</html>