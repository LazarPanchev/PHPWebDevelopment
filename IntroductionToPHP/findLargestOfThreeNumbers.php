<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 20.9.2018 г.
 * Time: 16:33
 */
//
//$firstNum=intval(fgets(STDIN));
//$secondNum=intval(fgets(STDIN));
//$thirdNum=intval(fgets(STDIN));
$firstNum=intval(readline());
$secondNum=intval(readline());
$thirdNum=intval(readline());

$biggestNum=max($firstNum,$secondNum,$thirdNum);
echo $biggestNum;
?>