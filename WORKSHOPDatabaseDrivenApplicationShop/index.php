<?php


spl_autoload_register();         //auto include - the class name must be equal to file name

$db = DBConnection::getConnection();

$product_obj = new Products($db);
$products = $product_obj->getList();

include 'header.html';           //add header here


echo '<h4><a href="createEditProduct.php">Create new product</a></h4>';

$mode=$_GET['mode']??null;
if ($mode==3) {
    echo '<p class="paragraph">Product deleted successfully!</p>';
}

echo '<table border="2" style="color: red">';
echo '<thead><tr><th>N</th><th>Product Name</th><th>Category</th><th colspan="3">Actions</th></tr></thead>';
echo '<tbody>';
foreach ($products as $product) {
    $productId = htmlspecialchars($product['product_id']);
    $productName = htmlspecialchars($product['product_name']);
    $id = $product['product_id'];
    $categoryName = htmlspecialchars($product['cat_name']);
    echo '<tr>';
    echo '<td>' . $productId . '</td>';
    echo '<td>' . $productName . '</td>';
    echo '<td>' . $categoryName . '</td>';
    echo '<td><a href="viewProduct.php?product_id=' . $id .'"</a>Details</td>';
    echo '<td><a href="createEditProduct.php?product_id=' . $id . '"</a>Edit</td>';
    echo '<td><a href="deleteProduct.php?product_id=' . $id . '"</a>Delete</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';

include('footer.html');          //include here footer

?>