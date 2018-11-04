<?php

spl_autoload_register();

$name = 'Vasil Ivanov';
$title = 'UML Basics ';
$price = '10';
$typeBook = 'GOLD';

try {
    if ($typeBook == 'STANDARD') {
        $book = new Book($title, $name, $price);

    } elseif ($typeBook == 'GOLD') {
        $book = new GoldenEditionBook($title, $name, $price);
    } else {
        throw new Exception('Type is not valid!');
    }
    echo $book;
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}


?>