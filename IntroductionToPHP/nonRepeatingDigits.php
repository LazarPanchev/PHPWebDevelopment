<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 22.9.2018 г.
 * Time: 10:20
 */

$inputNumber=(int)readline();
$result=[];

if($inputNumber<102){
    echo 'no';
}else{
    $smallerDigit=min($inputNumber,999);
    for ($i=102; $i<=$smallerDigit; $i++){
        $numAsString=(string)$i;
        $lastDigit=$numAsString[2];
        $middleDigit=$numAsString[1];
        $firstDigit=$numAsString[0];
        if($lastDigit!==$middleDigit && $middleDigit!== $firstDigit && $lastDigit!==$firstDigit){
            array_push($result,$numAsString);
        }
    }

    echo implode(", ",$result);
}

?>