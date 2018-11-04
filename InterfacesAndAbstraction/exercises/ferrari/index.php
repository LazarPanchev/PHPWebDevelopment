<?php

spl_autoload_register();

$name=readline();
//$name2=readline();
$ferrari= new Ferrari($name);
echo $ferrari;
//$ferrary2= new Ferrari($name2);
//echo $ferrary2;
