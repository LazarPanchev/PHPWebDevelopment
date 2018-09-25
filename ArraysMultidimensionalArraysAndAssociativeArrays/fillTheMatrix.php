<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 25.9.2018 г.
 * Time: 10:19
 */

$arr=explode(', ',readline());
$n=intval($arr[0]);
$pattern=$arr[1];
$matrix=[];
$counter=1;
for($i=0;$i<$n;$i++){
    for($j=0;$j<$n;$j++){
        $matrix[$j][$i]=0;
    }

}
switch ($pattern){
    case "A":
        for($i=0;$i<$n;$i++){
            for($j=0;$j<$n;$j++){
                $matrix[$j][$i]=$counter++;
            }

        }

        break;
    case "B":
        $row=0;
        $col=0;
        while ($counter<=$n*$n){
            for($i=0;$i<$n;$i++){
                $matrix[$i][$row]=$counter++;
            }

            $col++;
            if($counter>=$n*$n){
                break;
            }
            for($i=$n-1;$i>=0;$i--){
                $matrix[$i][$col]=$counter++;
            }
            $col++;
            $row+=2;
        }


        break;

    default:
        break;
}

foreach ($matrix as $line){
    echo implode(' ', $line) . PHP_EOL;
}



?>