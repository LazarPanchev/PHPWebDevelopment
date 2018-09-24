<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 21.9.2018 г.
 * Time: 20:39 ч.
 */

$input=readline();
$digits='';
$letters='';
$other='';
for($i=0;$i<strlen($input);$i++){
    $currLetter=$input[$i];
    $asciiValue=ord($currLetter);
    if(($asciiValue>=48 && $asciiValue<=57 )){
        $digits.=$currLetter;
    }elseif (($asciiValue>=65 && $asciiValue<=90 ) || ($asciiValue>=97 && $asciiValue<=122)){
        $letters.=$currLetter;
    }else{
        $other.=$currLetter;
    }
}

echo $digits . PHP_EOL;
echo $letters . PHP_EOL;
echo $other . PHP_EOL;
?>