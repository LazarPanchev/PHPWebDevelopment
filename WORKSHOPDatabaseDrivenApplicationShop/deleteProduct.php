<?php

spl_autoload_register();         //auto include - the class name must be equal to file name

$db = DBConnection::getConnection();

$products_obj = new Products($db);


if(isset($_POST['product_id'])){
    if (isset($_GET['product_id'])){
    $product_id= $_GET['product_id'];
    $products_obj->deleteProduct($product_id);

    header('Location: ./index.php?mode=3');
    exit;
    }
}
?>

<h3>Are you sure you want to delete this product?</h3>

<form method="post">
    <input type="hidden" name="product_id" value="<?= $_GET['product_id']?>">
    <a href="index.php">No</a>
    <input class="btn btn-default" type="submit" value="Yes">
</form>
