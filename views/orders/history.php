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
    <title>My Orders - Online Clothing Brand</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="container">
        <center>
            <h2>My Orders</h2>
            <p>Welcome, <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong></p>

            <?php if (empty($orders)) { ?>
                <p>You have not placed any orders yet.</p>
                <a href="../public/index.php?action=home">Start Shopping</a>

            <?php } else { ?>

                <?php foreach ($orders as $order) { ?>

                    <table border="1" cellpadding="10">
                        <tr>
                            <th colspan="2" style="text-align:left;">
                                Order <?php echo htmlspecialchars($order['order_id']); ?>
                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                <?php echo htmlspecialchars($order['order_date']); ?>
                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                Status: <strong><?php echo htmlspecialchars($order['order_status']); ?></strong>
                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                Total: <strong>৳ <?php echo number_format($order['order_total_amount'], 2); ?></strong>
                            </th>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <th>Qty &times; Unit Price</th>
                        </tr>

                        <?php
                            $items = $order_items_map[$order['order_id']] ?? [];
                            if (empty($items)) {
                        ?>
                        <tr>
                            <td colspan="2">No items found for this order.</td>
                        </tr>
                        <?php } else { ?>
                            <?php foreach ($items as $item) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                                <td>
                                    <?php echo htmlspecialchars($item['order_item_quantity']); ?>
                                    &times;
                                    ৳ <?php echo number_format($item['order_item_unit_price'], 2); ?>
                                    =
                                    ৳ <?php echo number_format($item['order_item_quantity'] * $item['order_item_unit_price'], 2); ?>
                                </td>
                            </tr>
                            <?php } ?>
                        <?php } ?>
                    </table>

                    <br>

                <?php } ?>

            <?php } ?>

            <br>
            <a href="../public/index.php?action=profile">Back to Profile</a>
            &nbsp;|&nbsp;
            <a href="../public/index.php?action=home">Back to Home</a>

        </center>
    </div>
</body>
</html>