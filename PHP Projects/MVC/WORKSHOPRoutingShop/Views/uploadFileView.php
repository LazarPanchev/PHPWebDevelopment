<br>
<form action="fileUpload.php" method="post" enctype="multipart/form-data">
    Upload a file:
    <input type="hidden" name="product_id" value="<?= $product_id ?>"/>
    <input type="file" accept="image/gif, image/jpeg, image/png" name="myfile" id="fileToUpload"/>
    <input type="submit" name="submit" value="Upload File Now"/>
</form>