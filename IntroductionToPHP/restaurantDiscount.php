<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 21.9.2018 г.
 * Time: 17:58
 */
$groupSize=intval(readline());
$packageType=readline();

$price=0;
$noAppropriateHall=false;
if($groupSize<=50){
    echo "We can offer you the Small Hall" . PHP_EOL;
    $price=2500;
}elseif ($groupSize<=100){
    echo "We can offer you the Terrace" . PHP_EOL;
    $price=5000;
}elseif ($groupSize<=120){
    echo "We can offer you the Great Hall" . PHP_EOL;
    $price=7500;
}else{
    echo "We do not have an appropriate hall.";
    $noAppropriateHall=true;
}

$packagePrice=0;
$discount=0;
switch ($packageType){
    case "Normal":
        $packagePrice=500;
        $discount=0.05;
        break;
    case "Gold":
        $packagePrice=750;
        $discount=0.10;
        break;
    case "Platinum":
        $packagePrice=1000;
        $discount=0.15;
        break;
    default:
        break;
}
$totalPrice=$price+$packagePrice;
$priceAfterDiscount=$totalPrice-($totalPrice*$discount);
$pricePerPerson=$priceAfterDiscount/$groupSize;

if(!$noAppropriateHall){
    printf("The price per person is %.2f$",$pricePerPerson);
}

?>