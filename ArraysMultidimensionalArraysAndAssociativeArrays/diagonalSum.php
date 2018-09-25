<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 25.9.2018 г.
 * Time: 15:51
 */

$matrixOne = [[20, 40], [10, 60]];
$matrixTwo = [[3, 5, 17], [-1, 7, 14], [1, -8, 89]];

$matrix = $matrixTwo;
$primaryDiagonal = 0;
$secondaryDiagonal = 0;

for ($i = 0; $i < count($matrix); $i++) {
    $primaryDiagonal += $matrix[$i][$i];
    $secondaryDiagonal+=$matrix[$i][count($matrix)-$i-1];
}

echo $primaryDiagonal . " " . $secondaryDiagonal;


?>