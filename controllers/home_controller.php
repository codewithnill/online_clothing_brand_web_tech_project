<?php
    require_once('../models/product.php');
    require_once('../models/category.php');
    require_once('../utils/auth_helper.php');

    function home() {
        $parent_categories = get_parent_categories();
        $categories = get_all_categories();
        $featured_products = get_featured_products();
        include('../views/home/index.php');
    }

    function show_category() {
        $category_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
 
        if ($category_id <= 0) {
            header('Location: /WebTech/online_clothing_brand/public/index.php?action=home');
            exit();
        }
 
        $category = get_category_by_id($category_id);
 
        if (!$category) {
            header('Location: /WebTech/online_clothing_brand/public/index.php?action=home');
            exit();
        }
 
        $products = get_products_by_category($category_id);
 
        include('../views/home/category.php');
    }

?>
