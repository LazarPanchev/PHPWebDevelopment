<?php

spl_autoload_register();
$car=new Car();
echo $car->drive();
echo $car->wash('shampo');
echo $car->clean();