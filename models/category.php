<?php
    require_once('../config/database.php');

    function get_all_categories() {
        $con = get_connection();
        $sql = "SELECT * FROM categories";
        $result = mysqli_query($con, $sql);
        
        $categories = [];
        while($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }
        
        mysqli_close($con);
        return $categories;
    }

    function get_parent_categories() {
        $con = get_connection();
        $sql = "SELECT * FROM categories WHERE parent_category_id IS NULL";
        $result = mysqli_query($con, $sql);
        
        $categories = [];
        while($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }
        
        mysqli_close($con);
        return $categories;
    }

    function get_category_by_id($category_id) {
        $con = get_connection();
        $sql = "SELECT * FROM categories WHERE category_id = '$category_id'";
        $result = mysqli_query($con, $sql);
        
        if(mysqli_num_rows($result) == 1) {
            $category = mysqli_fetch_assoc($result);
            mysqli_close($con);
            return $category;
        }
        
        mysqli_close($con);
        return null;
    }

    function add_category($category_name, $parent_category_id = null) {
        $con = get_connection();
        
        if($parent_category_id) {
            $sql = "INSERT INTO categories (category_name, parent_category_id) VALUES ('$category_name', '$parent_category_id')";
        } else {
            $sql = "INSERT INTO categories (category_name) VALUES ('$category_name')";
        }
        
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }

    function update_category($category_id, $category_name, $parent_category_id = null) {
        $con = get_connection();
        
        if($parent_category_id) {
            $sql = "UPDATE categories SET category_name = '$category_name', parent_category_id = '$parent_category_id' WHERE category_id = '$category_id'";
        } else {
            $sql = "UPDATE categories SET category_name = '$category_name', parent_category_id = NULL WHERE category_id = '$category_id'";
        }
        
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }

    function delete_category($category_id) {
        $con = get_connection();
        $sql = "DELETE FROM categories WHERE category_id = '$category_id'";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }

    function get_categories_by_parent($parent_id) {
        $con = get_connection();
        $sql = "SELECT * FROM categories WHERE parent_category_id = '$parent_id'";
        $result = mysqli_query($con, $sql);
        
        $categories = [];
        while($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }
        
        mysqli_close($con);
        return $categories;
    }
?>
