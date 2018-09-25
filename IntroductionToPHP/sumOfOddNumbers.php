<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 21.9.2018 г.
 * Time: 16:15
 */

$n = readline();
$sum = 0;

for ($i = 1; $i <=$n * 2; $i += 2) {
    echo $i . PHP_EOL;
    $sum += $i;

}
echo "Sum: $sum";

//$n=readline();
//$sum=0;
//$counter=1;
//$oddNums=0;
//while($oddNums<$n){
//    if($counter%2!==0){
//        $oddNums++;
//        $sum+=$counter;
//        echo $counter . PHP_EOL;
//    }
//    $counter++;
//}
//echo "Sum: $sum";

?>