<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 21.9.2018 г.
 * Time: 10:00 ч.
 */
 $inputArr=readline();
 $pieces=explode(" ",$inputArr);
// var_dump($pieces);
$result="";
for($i=0; $i<count($pieces);$i++){
    $currWord=$pieces[$i];
    $currWordLen=strlen($currWord);
    for($j=0;$j<$currWordLen;$j++){
        $result.=$pieces[$i];
    }
}

echo $result;
?>