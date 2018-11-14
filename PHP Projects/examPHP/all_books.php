<?php

require_once './common.php';

$bookRepository= new \App\Repository\BookRepository($pdoDB, $dataBinder);
$bookService= new \App\Service\BookService($bookRepository);

$bookHttpHandler= new \App\Http\BookHttpHandler($template, $dataBinder);
$bookHttpHandler->viewAll($bookService);
