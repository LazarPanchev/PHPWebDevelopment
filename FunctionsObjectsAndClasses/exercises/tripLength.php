<?php
$arr=array_map('floatval',explode(', ',readline()));
list($x1, $y1, $x2, $y2, $x3, $y3) = $arr;

$distanceBetweenPoints = function($x1, $y1, $x2, $y2){
    return sqrt(($x2 - $x1) * ($x2 - $x1) + ($y2 - $y1) * ($y2 - $y1));
};

$distance123 = $distanceBetweenPoints($x1, $y1, $x2, $y2) + $distanceBetweenPoints($x2, $y2, $x3, $y3);
$distance132 = $distanceBetweenPoints($x1, $y1, $x3, $y3) + $distanceBetweenPoints($x3, $y3, $x2, $y2);
$distance213 = $distanceBetweenPoints($x2, $y2, $x1, $y1) + $distanceBetweenPoints($x1, $y1, $x3, $y3);

$shortestDistance = min($distance123, $distance132, $distance213);

if ($shortestDistance === $distance123) {
    echo ("1->2->3: {$shortestDistance}");
} else if ($shortestDistance === $distance132) {
    echo ("1->3->2: {$shortestDistance}");
} else {
    echo ("2->1->3: {$shortestDistance}");
}
?>