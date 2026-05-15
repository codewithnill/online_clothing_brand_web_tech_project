<?php
    require_once('../config/database.php');

    function get_cart_items($user_id) {
        $con = get_connection();
        $sql = "SELECT cart.*, products.product_name, products.product_price, products.product_image_path 
                FROM cart 
                JOIN products ON cart.cart_product_id = products.product_id 
                WHERE cart.cart_user_id = '$user_id'";
        $result = mysqli_query($con, $sql);
        
        $items = [];
        while($row = mysqli_fetch_assoc($result)) {
            $items[] = $row;
        }
        
        mysqli_close($con);
        return $items;
    }

    function add_to_cart($user_id, $product_id, $quantity) {
        $con = get_connection();
        
        // Check if item already in cart
        $check_sql = "SELECT * FROM cart WHERE cart_user_id = '$user_id' AND cart_product_id = '$product_id'";
        $check_result = mysqli_query($con, $check_sql);
        
        if(mysqli_num_rows($check_result) > 0) {
            // Update quantity
            $sql = "UPDATE cart SET cart_quantity = cart_quantity + $quantity WHERE cart_user_id = '$user_id' AND cart_product_id = '$product_id'";
        } else {
            // Insert new
            $sql = "INSERT INTO cart (cart_user_id, cart_product_id, cart_quantity) VALUES ('$user_id', '$product_id', '$quantity')";
        }
        
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }

    function update_cart_quantity($user_id, $product_id, $quantity) {
        $con = get_connection();
        
        if($quantity <= 0) {
            $sql = "DELETE FROM cart WHERE cart_user_id = '$user_id' AND cart_product_id = '$product_id'";
        } else {
            $sql = "UPDATE cart SET cart_quantity = '$quantity' WHERE cart_user_id = '$user_id' AND cart_product_id = '$product_id'";
        }
        
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }

    function remove_from_cart($user_id, $product_id) {
        $con = get_connection();
        $sql = "DELETE FROM cart WHERE cart_user_id = '$user_id' AND cart_product_id = '$product_id'";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }

    function clear_cart($user_id) {
        $con = get_connection();
        $sql = "DELETE FROM cart WHERE cart_user_id = '$user_id'";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }

    function get_cart_total($user_id) {
        $con = get_connection();
        $sql = "SELECT SUM(products.product_price * cart.cart_quantity) as total 
                FROM cart 
                JOIN products ON cart.cart_product_id = products.product_id 
                WHERE cart.cart_user_id = '$user_id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($con);
        return $row['total'] ? $row['total'] : 0;
    }

    function get_cart_count($user_id) {
        $con = get_connection();
        $sql = "SELECT SUM(cart_quantity) as count FROM cart WHERE cart_user_id = '$user_id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($con);
        return $row['count'] ? $row['count'] : 0;
    }
?>