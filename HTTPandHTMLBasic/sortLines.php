<?php
if(isset($_GET['lines'])){
    $citiesArr=array_filter(array_map('trim',explode("\n",$_GET['lines'])));
    sort($citiesArr,SORT_STRING);
    $sortedLines=implode(PHP_EOL,$citiesArr);
}

?>


<form>
    <textarea rows="10" name="lines"><?= $sortedLines?></textarea><br>
    <input type="submit" value="Sort">
</form>

