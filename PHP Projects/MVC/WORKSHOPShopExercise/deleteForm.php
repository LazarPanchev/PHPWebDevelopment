<p class="paragraph">Are you sure you want to delete this product</p>
<!-- <button name="yes" value="yes">Yes</button>-->
<!-- <button name="no" value="no">No</button>-->
<form method="post">
    <input type="hidden" name="product_id" value="<?= $_GET['product_id']?>">
    <a href="index.php">No</a>
    <input class="btn btn-default" type="submit" value="Yes">
</form>