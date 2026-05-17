<?php
    require_once('../models/product.php');
    require_once('../models/category.php');

    function search() {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : '';
        $gender = isset($_GET['gender']) ? $_GET['gender'] : '';
        
        $products = search_products($keyword, $category_id, $gender);
        include('../views/products/search_results.php');
    }

    function show_filter() {
        $categories = get_all_categories();
        include('../views/products/filter.php');
    }
?>
