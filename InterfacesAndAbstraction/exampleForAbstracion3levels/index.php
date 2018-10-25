<?php

spl_autoload_register();   //if is turn on -> it is for the whole application!!

try{
    $app=new Application();
    $app->run();
}catch (Exception $e){
    echo "Some problem: " . $e->getMessage();
}

