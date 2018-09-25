<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 21.9.2018 г.
 * Time: 15:42
 */
$firstNum=intval(readline());
$secondNum=intval(readline());
$smallerNum=min($firstNum,$secondNum);
$biggerNum=max($firstNum,$secondNum);
for ($i=$smallerNum;$i<=$biggerNum;$i++){
    echo $i . "\n";
}

?>