<?php

spl_autoload_register();
try{
    $app=new Application();
    $app->run();
}catch (Exception $e){
    echo "Unknown Error; " . $e->getMessage();
}
?>