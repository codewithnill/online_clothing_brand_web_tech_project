<?php
    // session_start();
    require_once('../models/cart.php');
    require_once('../models/order.php');
    require_once('../models/order_item.php');
    require_once('../models/payment.php');
    require_once('../utils/auth_helper.php');


    // Shows the invoice summary (list of cart items + total) before payment.
    function show_invoice() {
        require_customer();

        $user_id    = get_current_user_id();
        $cart_items = get_cart_items($user_id);

        if (empty($cart_items)) {
            $_SESSION['checkout_error'] = "Your cart is empty. Add items before checking out.";
            header('Location: /WebTech/online_clothing_brand/public/index.php?action=cart');
            exit();
        }

        $cart_total = get_cart_total($user_id);

        include('../views/checkout/invoice.php');
    }


    // Shows the payment method selection form.
    function show_payment() {
        require_customer();

        $user_id    = get_current_user_id();
        $cart_items = get_cart_items($user_id);

        if (empty($cart_items)) {
            $_SESSION['checkout_error'] = "Your cart is empty.";
            header('Location: /WebTech/online_clothing_brand/public/index.php?action=cart');
            exit();
        }

        $cart_total = get_cart_total($user_id);

        include('../views/checkout/payment.php');
    }

    // Final submission: validate payment method, create order, order_items , payment record, clear cart
    function place_order() {
        require_customer();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /WebTech/online_clothing_brand/public/index.php?action=checkout_invoice');
            exit();
        }

        $user_id        = get_current_user_id();
        $cart_items     = get_cart_items($user_id);
        $payment_method = isset($_POST['payment_method']) ? trim($_POST['payment_method']) : '';

        $allowed_methods = ['Credit Card', 'bKash', 'Nagad', 'Bank Transfer', 'Cash on Delivery'];

        $errors = [];

        if (empty($cart_items)) {
            $errors[] = "Your cart is empty. Cannot place order.";
        }

        if (empty($payment_method) || !in_array($payment_method, $allowed_methods)) {
            $errors[] = "Please select a valid payment method.";
        }

        if (!empty($errors)) {
            $_SESSION['checkout_errors'] = $errors;
            header('Location: /WebTech/online_clothing_brand/public/index.php?action=checkout_payment');
            exit();
        }

        //Create order

        $total_amount = get_cart_total($user_id);

        $order_id = create_order($user_id, $total_amount);

        if (!$order_id) {
            $_SESSION['checkout_errors'] = ["Failed to place order. Please try again."];
            header('Location: /WebTech/online_clothing_brand/public/index.php?action=checkout_payment');
            exit();
        }

        //Save order items
        add_order_items($order_id, $cart_items);

        // Save payment record 
        $transaction_id = null;
        if ($payment_method !== 'Cash on Delivery') {
            $transaction_id = strtoupper(bin2hex(random_bytes(6)));//random number generator
        }

        add_payment($order_id, $total_amount, $payment_method, $transaction_id);

        
        //Clear cart 
        clear_cart($user_id);

        //Redirect to success page
        $_SESSION['last_order_id'] = $order_id;
        header('Location: /WebTech/online_clothing_brand/public/index.php?action=order_success');
        exit();
    }

    // Confirmation page shown after a successful order placement.
    function show_order_success() {
        require_customer();


        if (!isset($_SESSION['last_order_id'])) {
            header('Location: /WebTech/online_clothing_brand/public/index.php?action=home');
            exit();
        }

        $order_id = $_SESSION['last_order_id'];
        unset($_SESSION['last_order_id']);

        include('../views/checkout/success.php');
    }
?>