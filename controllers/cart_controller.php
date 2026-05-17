<?php
    require_once('../models/cart.php');
    require_once('../utils/auth_helper.php');

    function cart_index() {
        require_customer();
        $user_id = get_current_user_id();
        $cart_items = get_cart_items($user_id);
        $cart_total = get_cart_total($user_id);
        
        if(empty($cart_items)) {
            include('../views/cart/empty.php');
        } else {
            include('../views/cart/index.php');
        }
    }

    function add_cart() {
        require_customer();
        
        $user_id = get_current_user_id();
        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
        $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
        
        if(empty($product_id) || $quantity < 1) {
            echo "failed";
            exit();
        }
        
        $result = add_to_cart($user_id, $product_id, $quantity);
        
        if($result) {
            echo "success";
        } else {
            echo "failed";
        }
        exit();
    }

    function update_cart() {
        require_customer();
        
        $user_id = get_current_user_id();
        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
        $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
        
        $result = update_cart_quantity($user_id, $product_id, $quantity);
        
        if($result) {
            echo "success";
        } else {
            echo "failed";
        }
        exit();
    }

    function remove_cart() {
        require_customer();
        
        $user_id = get_current_user_id();
        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
        
        $result = remove_from_cart($user_id, $product_id);
        
        if($result) {
            echo "success";
        } else {
            echo "failed";
        }
        exit();
    }
?>
