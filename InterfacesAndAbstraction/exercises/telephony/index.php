<?php

spl_autoload_register();
try{
    $app= new Application();
    $app->run();
}catch (Exception $e){
    echo "Some Error: " . $e->getMessage();
}