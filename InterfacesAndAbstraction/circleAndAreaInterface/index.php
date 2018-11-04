<?php

spl_autoload_register();

//$circle= new Circle(10);
//echo $circle->getSurface() . PHP_EOL;
//
//$myRec=new Rectangle(2.5, 4);
//echo $myRec->getSurface() . PHP_EOL;
//echo $myRec->getArea() . PHP_EOL;

$myCircle= new Circle(12);

echo $myCircle->getSurface() .PHP_EOL;
echo $myCircle->getCircumference().PHP_EOL;