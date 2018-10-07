<?php

$arr=array_map('intval',explode(', ', readline()));
$x1=$arr[0];
$y1=$arr[1];
$x2=$arr[2];
$y2=$arr[3];

$checkDistance=function ($x1,$y1,$x2,$y2){
    $result= sqrt( pow($x1-$x2,2)+pow($y1-$y2,2));
    $printResult=sprintf("{%d, %d} to {%d, %d}", $x1,$y1,$x2,$y2);
    if((int)($result)==$result){
        echo $printResult . " is valid" . PHP_EOL;
    }else{
        echo $printResult . " is invalid" . PHP_EOL;
    }
};

$checkDistance($x1,$y1,0,0);
$checkDistance($x2,$y2,0,0);
$checkDistance($x1,$y1,$x2,$y2);


?>