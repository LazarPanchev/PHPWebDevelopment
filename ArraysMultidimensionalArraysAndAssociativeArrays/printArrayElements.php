<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 24.9.2018 г.
 * Time: 17:48 ч.
 */

$arr=explode(' ',readline());
array_map('intval',$arr);
for($i=0;$i<(int)count($arr)/2;$i++ ){
    $secEl=$arr[count($arr)-$i-1];
    if(count($arr)-$i-1!==$i){
        echo "$arr[$i] $secEl" . PHP_EOL;
    }else{
        echo "$arr[$i]". PHP_EOL;
    }
    
}
?>