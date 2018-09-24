<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 24.9.2018 г.
 * Time: 20:39 ч.
 */

$arr=explode(' ',readline());
array_map('floatval',$arr);

foreach ($arr as $num){
    $roundedNum=round($num,0,PHP_ROUND_HALF_UP);
    echo "$num => $roundedNum" . PHP_EOL;
}

?>