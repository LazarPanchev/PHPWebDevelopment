<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 24.9.2018 г.
 * Time: 16:50 ч.
 */
$arr=array('one','two', 'three');
for($i=0; $i<count($arr);$i++){
    $result=sprintf("arr[%d] = %s", $i,$arr[$i]) . PHP_EOL;
    echo $result;
}
?>