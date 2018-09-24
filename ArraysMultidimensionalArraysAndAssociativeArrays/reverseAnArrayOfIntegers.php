<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 24.9.2018 г.
 * Time: 17:07 ч.
 */
$n=intval(readline());
$arr=[];
for($i=0;$i<$n;$i++){
    array_push($arr,intval(readline()));
}
$result=array_reverse($arr);
echo implode(' ',$result);
//for($i=$n-1;$i>=0;$i--){
//    echo $arr[$i] . ' ';
//}
?>