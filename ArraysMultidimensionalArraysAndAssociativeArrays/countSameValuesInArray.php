<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 25.9.2018 г.
 * Time: 16:53
 */
$arr = array(-2.5, 4, 4, 3, -2.5, -5.5, 4, 3, 3, -2.5, 3);
$countNumbers=[];

for($i=0;$i<count($arr);$i++){
    $currElement=$arr[$i] . "";
    echo $currElement;
    if(!array_key_exists($currElement,$countNumbers)){

        $countNumbers[$arr[$i]]=0;
    }
    $countNumbers[$arr[$i]]++;
}

print_r($countNumbers);

?>