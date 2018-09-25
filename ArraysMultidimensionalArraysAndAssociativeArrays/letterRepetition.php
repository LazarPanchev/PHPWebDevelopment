<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 25.9.2018 г.
 * Time: 18:03
 */

$input=readline();
$occurrences=array();

for($i=0; $i<strlen($input); $i++ ){
    $currChar=$input[$i];
    if(!array_key_exists($currChar,$occurrences)){
        $occurrences[$currChar]=0;
    }
    $occurrences[$currChar]++;
}

foreach ($occurrences as $key=>$value){
    echo $key . " -> " . $value . PHP_EOL;
}

?>