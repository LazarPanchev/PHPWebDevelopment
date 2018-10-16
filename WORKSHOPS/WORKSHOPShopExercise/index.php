<?php

spl_autoload_register();

$connection=new DB_Connection();
$db=$connection->getConnection();

$productObj=new Product($db);
$allProducts=$productObj->getAll();

include ('views/header.html');
if($_GET['mode']??null){
    $mode=$_GET['mode'];
    if($mode==3){
        echo '<p class="success">You deleted the product successfully! </p>';
    }
}
echo '<h3><a href="createProduct.php">CREATE NEW PRODUCT</h3>';

$table='<table border="5"><thead><tr><th>Product Name</th><th>Product Price</th>
<th colspan="3">Actions</th></tr></thead><tbody>';
foreach ($allProducts as $product){
    $productId=$product["product_id"];
    $table.='<tr><td>' . $product['product_name'] .'</td>
                 <td>' . $product['price'] .'</td>
                 <td><a href="detailsProduct.php?product_id=' . $productId . '">Details</a></td>' .
                 '<td><a href="editProduct.php?product_id=' . $productId .'">Edit</a></td>' .
                 '<td><a href="deleteProduct.php?product_id=' . $productId . '">Delete</a></td></tr>';
}
$table.='</tbody></table>';   //'<td><a href="viewProduct.php?product_id=' . $id .'"</a>Details</td>';
echo $table;

include "views/footer.html";
?>