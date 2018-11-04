<?php

spl_autoload_register();

//$writerName=$_GET??'HTML';
$writerName='plain';  //HTML / JSON
$writerName.='Writer';
$article=new Article('Jurassic Park', 'J.Konor', '13.50');

try{
    $writer=Factory::getWriter($writerName);
    echo $writer->write($article);
}catch (Exception $e){
    echo "Error: " .  $e->getMessage();
}

