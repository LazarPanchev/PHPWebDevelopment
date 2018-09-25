<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 21.9.2018 г.
 * Time: 16:45
 */

$inputNum=intval(readline());
$multiplier=intval(readline());
if($multiplier>10){
    echo "$inputNum X $multiplier = " . $inputNum*$multiplier . PHP_EOL;
}else {
    for ($i = $multiplier; $i <= 10; $i++) {
        echo "$inputNum X $i = " . $inputNum * $i . PHP_EOL;
    }
}