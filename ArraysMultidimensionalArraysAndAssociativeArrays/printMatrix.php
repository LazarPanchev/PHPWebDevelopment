<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 25.9.2018 г.
 * Time: 9:56
 */

$rows=5;
$cols=4;
$count=1;

$matrix=[];
for($i=0;$i<$rows;$i++){
    $matrix[$i]=[];
    for($j=0;$j<$cols;$j++){
        $matrix[$i][$j]=$count++;
    }
}

print_r($matrix)
?>