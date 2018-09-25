<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 21.9.2018 г.
 * Time: 18:28
 */

$inputString=readline();
$stringLength=strlen($inputString);
$resultString="";
if($stringLength>20){
    for($i=0;$i<20;$i++){
        $resultString.=$inputString[$i];
    }
}else{
    $difference=20-$stringLength;
    $resultString=$inputString;
    $resultString.=str_repeat("*",$difference);
}
echo $resultString;
?>