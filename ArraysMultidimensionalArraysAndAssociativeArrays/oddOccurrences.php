<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 25.9.2018 г.
 * Time: 17:28
 */

$arr=explode(' ', readline());

$arr=array_map('strtolower',$arr);

$occurrences=array();

for($i=0;$i<count($arr);$i++){
    $currStr=$arr[$i];
    if(!array_key_exists($currStr,$occurrences)){
        $occurrences[$arr[$i]]=0;
    }
    $occurrences[$arr[$i]]++;
}

$result=[];
foreach ($occurrences as $key=>$value){
    if($value %2 !==0){
        array_push($result,$key);
    }
}

echo implode(', ', $result);

?>