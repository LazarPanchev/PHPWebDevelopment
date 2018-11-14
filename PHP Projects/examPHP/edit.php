<?php

require_once './common.php';

$bookRepository= new \App\Repository\BookRepository($pdoDB,$dataBinder);
$bookService= new \App\Service\BookService($bookRepository);

$genreRepository= new \App\Repository\GenreRepository($pdoDB);
$genreService= new \App\Service\GenreService($genreRepository);

$bookHttpHandler=new \App\Http\BookHttpHandler($template,$dataBinder);
$bookHttpHandler->edit($bookService,$genreService, $_POST, $_GET);
