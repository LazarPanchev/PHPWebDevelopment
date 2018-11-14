<?php

//        if (isset($_GET['isUploaded'])) {
//            if ($_GET['isUploaded'] == 1) {
//                echo "<p class='paragraph'> The image has been uploaded</p>";
//            }
//        }
//        if (isset($_GET['mode'])) {
//            if ($_GET['mode'] == 1) {
//                echo '<p class="paragraph">Successful created product!</p>';
//            } elseif ($_GET['mode'] == 2) {
//                echo '<p class="paragraph">Successful update product!</p>';
//            }
//
//        }

//here data is the concrete product
/**
 * @var \DTO\ProductDTO $data
 */
$productId = htmlspecialchars($data->getProductId());
$productName = htmlspecialchars($data->getProductName());
$productPrice = htmlspecialchars($data->getPrice());
$categoryName = htmlspecialchars($data->getCategoryName());
$productId = htmlspecialchars($data->getProductId());
$date = $data->getCreateDateFormatted();
$lastUpdate = $data->getLastUpdateFormatted();
$description = htmlspecialchars($data->getDescriptionForEmpty()) ;
?>

    <h3>Product details</h3><br/>
    <table border="2" style="color: blue">
        <thead>
        <tr>
            <th>N</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Category</th>
            <th>Date added</th>
            <th>Last updated</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?=$productId?></td>
            <td><?=$productName?></td>
            <td><?=$productPrice?></td>
            <td><?=$description?></td>
            <td><?=$categoryName?></td>
            <td><?=$date?></td>
            <td><?=$lastUpdate?></td>
        </tr>
        </tbody>
    </table>

<?php
if ($data->getImage() != null) {
    $imageName = ($data->getImage());
    $imagePath = '/uploads/' . $imageName;
    $src=APP_ROOT . $imagePath;
    echo "<hr /><img src='" . $src . "' width='400px' height='200px' /><hr>";
}
?>
<br>
<!--<form action="fileUpload.php" method="post" enctype="multipart/form-data">-->
<!--    Upload a file:-->
<!--    <input type="hidden" name="product_id" value="--><?//= $productId ?><!--"/>-->
<!--    <input type="file" accept="image/gif, image/jpeg, image/png" name="myfile" id="fileToUpload"/>-->
<!--    <input type="submit" name="submit" value="Upload File Now"/>-->
<!--</form>-->
