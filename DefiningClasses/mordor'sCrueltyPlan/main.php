<?php

spl_autoload_register();

$foodTokens =array_filter(explode(',',trim(readline())));

$gandalf=new Gandalf();
foreach ($foodTokens as $foodName){
    $foodName=strtolower($foodName);
    $currFoodObj=FoodFactory::returnNewFood($foodName);
    $gandalf->eat($currFoodObj);
}

$gandalfPoints= $gandalf->getTotalPoints();
echo $gandalfPoints . PHP_EOL;
$moodObj=MoodFactory::getMood($gandalfPoints);
echo $gandalf->getMood($moodObj);