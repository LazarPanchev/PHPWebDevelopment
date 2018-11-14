<?php

spl_autoload_register();         //auto include - the class name must be equal to file name

$db = DBConnection::getConnection();
$products_obj = new Products($db);
$categories_obj = new Categories($db);

$product = ['product_id' => '', 'product_name' => '', 'price' => '', 'description' => '', 'cat_id' => ''];

//if we have something in $_POST we will create or just see the form to create
if ($_POST) {         // if we have something in $_Post so we are here from submit form otherwise we come here from hyperlink createProduct
    //we use the same page for show the table createProducty and send the information for create a new product
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $cat_id = $_POST['cat_id'];
    $product_id = $_POST['product_id'] ?? null;
    if (!$product_id) {
        $product_id = $products_obj->createProduct($product_name, $price, $description, $cat_id);
        $mode = 1;
    } else {       //update
        $products_obj->updateProduct($product_id, $product_name, $price, $description, $cat_id);
        $mode = 2;
    }
    header('Location: ./viewProduct.php?product_id=' . $product_id . '&mode=' . $mode);  //add to the header where to redirect
    exit;


    //exit before show for a milliseconds the empty form
} elseif (isset($_GET['product_id'])) {     //if we have id we will edit the product
    $product = $products_obj->getOne($_GET['product_id']);
}

include('header.html');
include('createForm.php');
include('footer.html');
?>