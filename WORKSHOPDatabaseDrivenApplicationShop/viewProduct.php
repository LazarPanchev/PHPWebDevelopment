<?php
spl_autoload_register();         //auto include - the class name must be equal to file name

$db = DBConnection::getConnection();

$products_obj = new Products($db);
$product_id = $_GET['product_id'] ?? null;

include('header.html');
if (isset($_GET['isUploaded'])) {
    if ($_GET['isUploaded'] == 1) {
        echo "<p class='paragraph'> The image has been uploaded</p>";
    }
}

if (isset($_GET['mode'])) {
    if ($_GET['mode'] == 1) {
        echo '<p class="paragraph">Successful created product!</p>';
    } elseif ($_GET['mode'] == 2) {
        echo '<p class="paragraph">Successful update product!</p>';
    }

}

if ($product_id) {
    $product = $products_obj->getOne($product_id);
    if ($product) {
        $productId = htmlspecialchars($product['product_id']);
        $productName = htmlspecialchars($product['product_name']);
        $productPrice = htmlspecialchars($product['price']);
        $categoryName = htmlspecialchars($product['cat_name']);
        $productId = htmlspecialchars($product['product_id']);

        echo '<h3>Product details</h3><br />';
        echo '<table border="2" style="color: blue">';
        echo '<thead><tr><th>N</th><th>Product Name</th><th>Price</th><th>Description</th><th>Category</th><th>Date added</th><th>Last updated</th></tr></thead>';
        $date = htmlspecialchars(($product['create_date'] ? date('d-m-Y H:i:m',
            strtotime($product['create_date'])) : '--Not Available--'));
        $lastUpdate = htmlspecialchars(($product['last_update'] ? date('d-m-Y H:i:m',
            strtotime($product['last_update'])) : '--Not Available--'));
        $description = htmlspecialchars($product['description'] ? $product['description'] : '--Not Available--');
        echo '<tbody><tr>';
        echo '<td>' . $productId . '</td>';
        echo '<td>' . $productName . '</td>';
        echo '<td>' . $productPrice . '</td>';
        echo '<td>' . $description . '</td>';
        echo '<td>' . $categoryName . '</td>';
        echo '<td>' . $date . '</td>';
        echo '<td>' . $lastUpdate . '</td>';
        echo '</tr>';
        echo '</tbody></table>';


        if($product['image']!= null){
            $imageName = ($product['image']);
            $imagePath = '/uploads/' . $imageName;
            echo "<hr /><img src='.$imagePath.'  width='400px' height='200px' /><hr>";
        }
    } else {
        echo 'No product found!';
    }
} else {
    echo 'No product id!';
}

include('footer.html');

?>
<br>
<form action="fileUpload.php" method="post" enctype="multipart/form-data">
    Upload a file:
    <input type="hidden" name="product_id" value="<?= $product_id ?>"/>
    <input type="file" accept="image/gif, image/jpeg, image/png" name="myfile" id="fileToUpload"/>
    <input type="submit" name="submit" value="Upload File Now"/>
</form>