<?php
    require_once('../models/product.php');

    function product_details() {
        $product_id = isset($_GET['id']) ? $_GET['id'] : '';
        $product = get_product_by_id($product_id);
        include('../views/products/details.php');
    }
?>
