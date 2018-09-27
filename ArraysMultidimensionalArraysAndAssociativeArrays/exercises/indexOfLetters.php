<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 26.9.2018 г.
 * Time: 11:10
 */

$alphabet=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

$word=strtolower(readline());
for ($i=0;$i<strlen($word);$i++){
    $currChar=$word[$i];
//    printf("%s -> %s",$currChar,array_search($word[$i],$alphabet) . PHP_EOL);
    printf("%s -> %s",$currChar,array_search($word[$i],$alphabet) . PHP_EOL);
}


?>