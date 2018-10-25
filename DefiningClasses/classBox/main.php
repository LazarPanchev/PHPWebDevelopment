<?php

include 'Box.php';
$length=floatval(readline());
$width=floatval(readline());
$height=floatval(readline());

//Surface Area – 52.00
//Lateral Surface Area – 40.00
//Volume – 24.00
$box= new Box($length,$width,$height);
echo $box;


?>