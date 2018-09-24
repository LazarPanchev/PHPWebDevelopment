<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 21.9.2018 г.
 * Time: 20:11 ч.
 */

$inputString=readline();
$secondInput=readline();
$array=explode(" ",$secondInput);
$letter=$array[0];
$numberN=(int)$array[1];
$counter=0;
$searchedIndex=0;
$foundResult=false;

for($i=0;$i<strlen($inputString)-1;$i++){
    if($inputString[$i]===$letter){
        $counter++;
        if($counter===$numberN){
            $searchedIndex=$i;
            $foundResult=true;
            break;
        }
    }
}
if(!$foundResult){
    echo "Find the letter yourself!";
}else{
    echo $searchedIndex;
}

?>