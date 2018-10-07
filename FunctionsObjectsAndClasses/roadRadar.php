<?php


$speed=intval(readline());
$area=readline();

function getInfraction($speed, $area){
    $overSpeed=0;
    switch ($area){
        case "motorway":
            $overSpeed=$speed-130;
            break;
        case "interstate":
            $overSpeed=$speed-90;
            break;
        case "city":
            $overSpeed=$speed-50;
            break;
        case "residential":
            $overSpeed=$speed-20;
            break;
    }


    if($overSpeed>=0 && $overSpeed<20){
        return 'speeding';
    }elseif ($overSpeed>=0 && $overSpeed<=40){
        return 'excessive speeding';
    }elseif($overSpeed>0){
        return 'reckless driving';
    }else{
        return '';
    }
}

echo getInfraction($speed,$area);

?>