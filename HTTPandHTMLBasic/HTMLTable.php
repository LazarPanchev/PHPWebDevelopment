<?php
if(isset($_GET['categories']) && isset($_GET['tags']) && isset($_GET['months'])){
    $categories=explode(', ',$_GET['categories']);
    $tags=explode(', ',$_GET['tags']);
    $months=explode(', ',$_GET['months']);

    echo "<h2>Categories</h2>";
    echo "<ul>";
    foreach ($categories as $item){
        echo "<li>$item</li>";
    }
    echo "</ul>";

    echo "<h2>Tags</h2>";
    echo "<ul>";
    foreach ($tags as $item){
        echo "<li>$item</li>";
    }
    echo "</ul>";

    echo "<h2>Months</h2>";
    echo "<ul>";
    foreach ($months as $item){
        echo "<li>$item</li>";
    }
    echo "</ul>";


}

?>