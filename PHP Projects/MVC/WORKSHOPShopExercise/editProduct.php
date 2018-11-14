<?php

spl_autoload_register();
$connection = new DB_Connection();
$db = $connection->getConnection();

$productObj = new Product($db);
$productId = $_GET['product_id'];
if ($_POST) {
    $productName = $_POST['product_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['cat_id'];
    $productObj->editProduct($productId, $productName, $price, $category, $description);
    header('Location: ./detailsProduct.php?product_id=' . $productId . '&mode=2');
    exit;
}

$product = ['product_id' => '', 'product_name' => '', 'price' => '',
    'description' => '', 'cat_id' => ''];
$product = $productObj->getOne($productId);
$categoryObj = new Category($db);
$categories = $categoryObj->getCategories();

include('views/header.html');
include('editForm.php');
include('views/footer.html');

