<?php

spl_autoload_register();

$d= new DesktopComputer(8,3.2);
echo $d->getParameters();

$laptopOne= new Laptop(3,1.8);
$laptopTwo= new Laptop(4,2.2);

echo $laptopOne->clickFinger();
echo $laptopTwo->moveFinger();

$tablet= new Tablet('A1',true,'2000mA');
echo $tablet->getSize();

$mobilePhone= new MobilePhone('Vivacom',false,'3000mA');
echo $mobilePhone->moveFinger();

$n=new Notebook('Mobile', true, '4000mA');
$n->writeText();
echo $n->getWrittenText();