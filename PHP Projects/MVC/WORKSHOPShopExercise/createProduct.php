<?php
spl_autoload_register();
$connection=new DB_Connection();
$db=$connection->getConnection();

$productObj=new Product($db);

$categoryObj=new Category($db);
$categories=$categoryObj->getCategories();

if($_POST){
    $productName=$_POST['product_name'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $category=$_POST['cat_id'];
    $newProductId=$productObj->createProduct($productName,$price,$category,$description);

    header('Location: ./detailsProduct.php?product_id=' . $newProductId . '&mode=1');
}
include ('./views/header.html');
include ('createProductForm.php');
include ('./views/footer.html');
?>