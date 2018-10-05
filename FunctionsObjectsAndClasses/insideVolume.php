<?php

$arr=array_map('intval', explode(', ', readline()));

for ($i=0; $i<count($arr); $i+=3){
    $inputX=$arr[$i];
    $inputY=$arr[$i+1];
    $inputZ=$arr[$i+2];
    if(isInsideTheCube($inputX,$inputY,$inputZ)){
        echo 'inside' . PHP_EOL;
    }else{
        echo 'outside' . PHP_EOL;
    }
}

function isInsideTheCube($x,$y,$z) {
    if($x>=10 && $x<=50 && $y>=20 && $y<=80 && $z>=15 && $z<=50){
        return true;
    }else{
        return false;
    }
}
?>