<?php

require_once './common.php';

$bookRepository= new \App\Repository\BookRepository($pdoDB,$dataBinder);
$bookService= new \App\Service\BookService($bookRepository);

$genreRepository= new \App\Repository\GenreRepository($pdoDB);
$genreService= new \App\Service\GenreService($genreRepository);

$userRepository= new \App\Repository\UserRepository($pdoDB);
$userService= new \App\Service\UserService($userRepository);

$bookHttpHandler=new \App\Http\BookHttpHandler($template,$dataBinder);
$bookHttpHandler->add($bookService,$genreService,$userService, $_POST);
