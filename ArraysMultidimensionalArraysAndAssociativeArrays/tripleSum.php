<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 24.9.2018 г.
 * Time: 17:35 ч.
 */

$array=explode(' ',readline());
array_map('intval',$array);
$haveResult=false;

for($i=0;$i<count($array);$i++){
    $firstNum=$array[$i];
    for($j=0;$j<count($array);$j++){
        $secondNum=$array[$j];
        for($k=0;$k<count($array);$k++){
            $sum=$array[$k];
            if ($firstNum+$secondNum==$sum && $i<$j  ){
                echo "$array[$i] + $array[$j] == $array[$k]" . PHP_EOL;
                $haveResult=true;
            }
        }
    }
}
if(!$haveResult){
    echo 'No';
}
?>