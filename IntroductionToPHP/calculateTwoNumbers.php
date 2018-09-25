<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 20.9.2018 г.
 * Time: 14:53
 */

$firstNum=intval(readline());
$secondNum=intval(readline());
$command=readline();

switch ($command){
    case "sum":
        echo $firstNum+$secondNum;
        break;
    case "divide":
        if($secondNum===0){
            echo "Cannot divide by zero";
        }else{
            echo $firstNum/$secondNum;
        }
        break;
    case "subtract":
        echo $firstNum-$secondNum;
        break;
    case "multiply":
        echo $firstNum*$secondNum;
        break;
    default:
        echo "Wrong operation supplied";
        break;
}
?>