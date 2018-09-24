<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 24.9.2018 г.
 * Time: 20:49 ч.
 */

$firstArr=explode(' ','1 2 3 4 5');
array_map('intval',$firstArr);

$secondArr=explode(' ','2 3');
array_map('intval',$secondArr);

$resultArr=[];
$biggerCount=max(count($firstArr),count($secondArr));

for($i=0; $i<$biggerCount;$i++){
   $resultArr[]=$firstArr[$i%count($firstArr)]+$secondArr[$i%count($secondArr)];
}

echo implode(' ', $resultArr);

?>