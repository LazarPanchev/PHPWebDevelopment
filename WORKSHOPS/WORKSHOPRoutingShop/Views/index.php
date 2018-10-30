<?php

$mode=$_GET['mode']??null;
if ($mode==3) {
    echo '<p class="paragraph">Product deleted successfully!</p>';
}
if($_SESSION['user_id']){
    echo "<h4><a href='Users/logout/'>LOGOUT</a></h4>";
}
echo '<h4><a href="Products/createEdit/">Create new product</a></h4>';
echo '<table border="2" style="color: red">';
echo '<thead><tr><th>N</th><th>Product Name</th><th>Category</th><th colspan="3">Actions</th></tr></thead>';
echo '<tbody>';
foreach ($data['products'] as $product) {                               //products comes from controller index
    $productId = htmlspecialchars($product['product_id']);
    $productName = htmlspecialchars($product['product_name']);
    $id = $product['product_id'];
    $categoryName = htmlspecialchars($product['cat_name']);
    echo '<tr>';
    echo '<td>' . $productId . '</td>';
    echo '<td>' . $productName . '</td>';
    echo '<td>' . $categoryName . '</td>';
    echo '<td><a href="Products/view/' . $id .'"</a>Details</td>';
    echo '<td><a href="Products/createEdit/' . $id . '"</a>Edit</td>';
    echo '<td><a href="Products/delete/' . $id . '"</a>Delete</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';