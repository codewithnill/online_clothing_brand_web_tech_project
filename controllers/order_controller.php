<?php
    // session_start();
    require_once('../models/order.php');
    require_once('../utils/auth_helper.php');

    function order_list() {
        require_admin();
        $orders = get_all_orders();
        include('../views/admin/orders/list.php');
    }

    function update_order_status() { // for AJAX request
        require_admin();
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $order_id = $_POST['order_id'];
            $status = $_POST['status'];
            
            $result = update_order_status_by_id($order_id, $status);
            
            if($result) {
                echo "success";
            } else {
                echo "failed";
            }
        }
    }

    function purchase_history() {
        require_admin();
        $orders = get_all_orders();
        include('../views/admin/purchase_history/all.php');
    }
?>