<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 25.9.2018 г.
 * Time: 14:18
 */
$input=readline();
$arr=explode(', ',$input);
$n=intval($arr[0]);
$length=intval($arr[1]);
$matrix=[];
for($i=0;$i<$n;$i++){
    $currArr=explode(', ',readline());
    $currArr=array_map('intval',$currArr);
    array_push($matrix,$currArr);
}
$maxNum=$matrix[0][0];
$minNum=$matrix[0][0];
for($i=0;$i<count($matrix);$i++){
    $col=count($matrix[$i]);
    for($j=0;$j<$col;$j++){
        if($matrix[$i][$j]>$maxNum){
            $maxNum=$matrix[$i][$j];
        }
        if($matrix[$i][$j]<$minNum){
            $minNum=$matrix[$i][$j];
        }
    }
}

echo "Min: $minNum" . PHP_EOL;
echo "Max: $maxNum";

?>