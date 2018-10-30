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

$productId = htmlspecialchars($data['product']['product_id']);
$productName = htmlspecialchars($data['product']['product_name']);
$productPrice = htmlspecialchars($data['product']['price']);
$categoryName = htmlspecialchars($data['product']['cat_name']);
$productId = htmlspecialchars($data['product']['product_id']);

echo '<h3>Product details</h3><br />';
echo '<table border="2" style="color: blue">';
echo '<thead><tr><th>N</th><th>Product Name</th><th>Price</th><th>Description</th><th>Category</th><th>Date added</th><th>Last updated</th></tr></thead>';
$date = htmlspecialchars(($data['product']['create_date'] ? date('d-m-Y H:i:m',
    strtotime($data['product']['create_date'])) : '--Not Available--'));
$lastUpdate = htmlspecialchars(($data['product']['last_update'] ? date('d-m-Y H:i:m',
    strtotime($data['product']['last_update'])) : '--Not Available--'));
$description = htmlspecialchars($data['product']['description'] ? $data['product']['description'] : '--Not Available--');
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


if ($data['product']['image'] != null) {
    $imageName = ($data['product']['image']);
    $imagePath = '/uploads/' . $imageName;
    echo $imagePath;
    echo "<hr /><img src='.$imagePath.'  width='400px' height='200px' /><hr>";
}