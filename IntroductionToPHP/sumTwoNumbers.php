<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 21.9.2018 г.
 * Time: 10:39 ч.
 */

$firstNumber=floatval(readline());
$secondNumber=floatval(readline());

$sum=$firstNumber+$secondNumber;
$result=number_format($sum,2, '.', '');
echo '$firstNumber + $secondNumber = ' . "$firstNumber + $secondNumber = $result";
?>