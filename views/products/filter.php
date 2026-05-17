<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Products</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="container">
        <center>
            <h2>Filter products</h2>
            
            <form id="searchForm">
                <input type="text" id="keyword" name="keyword" placeholder="Product name">
                <select id="gender" name="gender">
                    <option value="">All Gender</option>
                    <option value="Men">Men</option>
                    <option value="Women">Women</option>
                </select>
                <select id="category_id" name="category_id">
                    <option value="">All Category</option>
                    <?php foreach($categories as $category) { ?>
                        <?php if($category['parent_category_id'] != null) { ?>
                            <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <input type="submit" value="Filter">
            </form>
            
            <br>
            <div id="searchResults"></div>
            
            <br>
            <a href="../public/index.php?action=home">Back to home</a>
        </center>
    </div>
    
    <script src="../public/js/search.js"></script>
</body>
</html>
