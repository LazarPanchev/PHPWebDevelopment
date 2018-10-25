<?php
include 'Box.php';

$length=floatval(readline());
$width=floatval(readline());
$height=floatval(readline());

try{
    $box= new Box($length,$width,$height);
    echo $box;
}catch (Exception $exception){
    echo $exception->getMessage();
}


?>

