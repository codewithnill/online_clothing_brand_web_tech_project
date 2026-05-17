<?php
    require_once('../models/product.php');
    require_once('../models/category.php');

    function home() {
        $parent_categories = get_parent_categories();
        $categories = get_all_categories();
        $featured_products = get_featured_products();
        include('../views/home/index.php');
    }
?>
