<?php

$strNum=readline();
$average=sumDigits($strNum);


while ($average<=5){
    $strNum.='9';
    $average=sumDigits($strNum);
}
echo $strNum;


function sumDigits($strNum){
    $sum=0;
    for($i = 0; $i < strlen($strNum); $i++) {
        $currDigit=(int)$strNum[$i];
        $sum+=$currDigit;
    }
    return $sum/strlen($strNum);
}



?>