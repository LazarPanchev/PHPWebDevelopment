<?php

require_once './common.php';

$userRepository=new \App\Repository\UserRepository($pdoDB);
$userService= new \App\Service\UserService($userRepository);

$bookRepository=new \App\Repository\BookRepository($pdoDB, $dataBinder);
$bookService= new \App\Service\BookService($bookRepository);

$genreRepository= new \App\Repository\GenreRepository($pdoDB);
$genreService= new \App\Service\GenreService($genreRepository);

$bookHttpHandler= new \App\Http\BookHttpHandler($template,$dataBinder);
$bookHttpHandler->view($bookService,$userService,$genreService,$_GET);