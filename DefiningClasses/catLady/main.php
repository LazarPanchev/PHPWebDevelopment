<?php

spl_autoload_register();

$input = readline();
$result = [];
while ($input!="End"){
    $tokens = array_filter(explode(' ', $input));
    [$typeCat, $name, $specific] = $tokens;

    $cat = new $typeCat($name);
    $cat->catSpecific($specific);

    $result[$name] = $cat;

    $input=readline();
}

$searchedCat = readline();
echo $result[$searchedCat];