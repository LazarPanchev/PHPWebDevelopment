<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 21.9.2018 г.
 * Time: 09:42 ч.
 */
$inputNum=intval(readline());
for($i=1;$i<=$inputNum;$i++){
    $currentNum=$i;
    $sum=0;
    while ($currentNum >0) {
        $sum += $currentNum % 10;
        $currentNum =(int)($currentNum/10);
    }
//    echo "$sum\n";
    if($sum===5 || $sum===7 || $sum===11){
        echo "$i -> True\n";
    }else{
        echo "$i -> False\n";
    }
}
