<?php
spl_autoload_register();

$connection=new DB_Connection();
$db=$connection->getConnection();

$productId=$_GET['product_id'];
$productObj=new Product($db);
$product=$productObj->getOne($productId);
include ('views/header.html');
echo '<h2>Product Details</h2><hr>';
if($_GET['mode']??null){
    $mode=$_GET['mode'];
    if($mode==1){
        echo '<p class="success">You created new product successfully! </p>';
    }elseif ($mode==2){
        echo '<p class="success">You updated the product successfully! </p>';
    }elseif ($mode=4){
        echo '<p class="success">You upload product picture successfully! </p>';
    }
}

$table='<table border="5"><thead><tr><th>Product Name</th><th>Product Price</th>
<th>Category</th><th>Description</th><th>Create on</th><th>Last Update On</th></tr></thead><tbody>';
$productName=htmlspecialchars($product['product_name']);
$price=htmlspecialchars($product['price']);
$category=htmlspecialchars($product['cat_name']);
$description=htmlspecialchars($product['description']);
$createDate=htmlspecialchars($product['create_date']? date('d-m-Y H:i:m',strtotime($product['create_date'])):'N/A');
$lastUpdate=htmlspecialchars($product['last_update']? date('d-m-Y H:i:m',strtotime($product['last_update'])):'N/A');

$table.='<tr><td>' . $productName .'</td>
                 <td>' . $price .'</td>
                 <td>' . $category .'</td>
                 <td>' . $description .'</td>
                 <td>' . $createDate .'</td>
                 <td>' . $lastUpdate.'</td></tr></tbody></table>';
echo $table;

echo '<hr>';
if($product['image']!= null){
    $imageName = ($product['image']);
    $imagePath = '/uploads/' . $imageName;
    echo "<hr /><img src='.$imagePath.'  width='400px' height='200px' /><hr>";
}
include ('views/footer.html');
?>
<hr>
<h2>Product Picture</h2>
<form action="fileUpload.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="product_id" value="<?= $productId ?>">
    Upload file
    <input type="file" name="myfile" id="fileToUpload /">
    <input type="submit" name="submit" value="Upload File NOW" />
</form>



