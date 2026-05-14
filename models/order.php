<?php
    require_once('../config/database.php');

    function get_total_orders() {
        $con = get_connection();
        $sql = "SELECT COUNT(*) as total FROM orders";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($con);
        return $row['total'];
    }

    function get_pending_orders_count() {
        $con = get_connection();
        $sql = "SELECT COUNT(*) as total FROM orders WHERE order_status = 'pending'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($con);
        return $row['total'];
    }

    function get_all_orders() {
        $con = get_connection();
        $sql = "SELECT o.*, u.user_name FROM orders o 
                JOIN users u ON o.order_user_id = u.user_id 
                ORDER BY o.order_date DESC";
        $result = mysqli_query($con, $sql);
        
        $orders = [];
        while($row = mysqli_fetch_assoc($result)) {
            $orders[] = $row;
        }
        
        mysqli_close($con);
        return $orders;
    }

    function update_order_status($order_id, $status) {
        $con = get_connection();
        $sql = "UPDATE orders SET order_status = '$status' WHERE order_id = '$order_id'";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }
?>