<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 25.9.2018 г.
 * Time: 10:00
 */
$matrix=[[1,2,3],[4,5,6],[7,8,9]];
$row=count($matrix);
$maxNum=$matrix[0][0];
for($i=0;$i<$row;$i++){
    $col=count($matrix[$i]);
    for($j=0;$j<$col;$j++){
        if($matrix[$i][$j]>$maxNum){
            $maxNum=$matrix[$i][$j];
        }
    }
}

//foreach ($matrix as $row){
//    foreach ($row as $num){
//        if($num>$maxNum){
//            $maxNum=$num;
//        }
//    }
//}

echo $maxNum;

?>