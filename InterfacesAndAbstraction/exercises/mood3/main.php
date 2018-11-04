<?php

spl_autoload_register();

$line=trim(readline());
[$username,$characterType,$specialPoints,$level]=explode(' | ',$line);

if(class_exists($characterType)){
    $character= new $characterType($username,intval($level),floatval($specialPoints));
    $character->hash();
    echo $character;
}
