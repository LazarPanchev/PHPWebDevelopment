<?php
spl_autoload_register();
$connection=new DB_Connection();
$db=$connection->getConnection();

$productObj=new Product($db);

if($_POST){
    $productId=$_GET['product_id'];
    $productObj->deleteProduct($productId);

    header('Location: ./index.php?' . '&mode=3');
    exit;
}
include ('views/header.html');

include ('deleteForm.php');
include ("views/footer.html");
?>