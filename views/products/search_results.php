<?php if(empty($products)) { ?>
    <p>No products found.</p>
<?php } else { ?>
    <table border="1" cellpadding="10">
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Gender</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
        <?php foreach($products as $product) { ?>
        <tr>
            <td><?php echo $product['product_name']; ?></td>
            <td><?php echo isset($product['category_name']) ? $product['category_name'] : ''; ?></td>
            <td><?php echo $product['product_gender']; ?></td>
            <td><?php echo $product['product_price']; ?></td>
            <td><?php echo $product['product_stock']; ?></td>
            <td>
                <a href="../public/index.php?action=product_details&id=<?php echo $product['product_id']; ?>">Details</a>
            </td>
        </tr>
        <?php } ?>
    </table>
<?php } ?>
