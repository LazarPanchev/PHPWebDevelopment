<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 26.9.2018 г.
 * Time: 11:34
 */

$arr=explode(' ',readline());

for($i=count($arr)-1;$i>=0;$i--){
    echo $arr[$i] . " ";
}
//$result=array_reverse($arr);
//echo implode(' ', $result);
?>