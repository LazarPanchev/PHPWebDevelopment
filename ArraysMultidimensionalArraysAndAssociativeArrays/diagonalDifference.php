<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 25.9.2018 г.
 * Time: 16:02
 */

$n=intval(readline());
$matrix=[];
for ($i=0;$i<$n;$i++){
    $currArr=explode(' ', readline());
    $currArr=array_map('intval',$currArr);
    array_push($matrix,$currArr);
}
$mainSum=0;
$primarySum=0;
for($i=0;$i<count($matrix);$i++){
    $mainSum+=$matrix[$i][$i];
    $primarySum+=$matrix[$i][count($matrix)-$i-1];
}
echo abs($mainSum-$primarySum);

?>