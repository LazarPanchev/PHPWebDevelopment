<?php

spl_autoload_register();

$line=readline();

$result = [];
while ($line !== "End"){
    $tokens = explode(' ', $line);
    $volunteer = null;
    if (count($tokens) == 5) {
        $volunteer = new Citizen($tokens[1], intval($tokens[2]), $tokens[3], $tokens[4]);
    } else {
        $volunteer = new $tokens[0]($tokens[1], $tokens[2]);
    }
   if(get_class($volunteer)!= 'Robot'){
       $result[] = $volunteer;
   };

    $line=readline();
}

$date = readline();
foreach ($result as $obj) {
    if ($obj->checkDate($date)) {
        echo $obj->getBirthDate() .PHP_EOL;
    };
}
