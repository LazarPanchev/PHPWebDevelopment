<?php

spl_autoload_register();

try {
    $c=new Child('Mimi',33);
    echo $c->getAge();
}catch (Exception $e){
    echo $e->getMessage() . PHP_EOL;
}





?>