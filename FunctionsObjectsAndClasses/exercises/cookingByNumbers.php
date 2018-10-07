<?php

$number=intval(readline());
$commandsArr=explode(', ', readline());

function cooking($number,$commandsArr){
    for($i = 0; $i < count($commandsArr); $i++) {
        $currComand=$commandsArr[$i];
        switch ($currComand){
            case 'chop':
                $number=($number/2);
                break;
            case 'dice':
                $number=sqrt($number);
                break;
            case 'spice':
                $number++;
                break;
            case 'bake':
                $number*=3;
                break;
            case 'fillet':
                $number=$number-($number*0.2);
                break;
        }
        echo $number .PHP_EOL;
    }
}

cooking($number,$commandsArr)




?>