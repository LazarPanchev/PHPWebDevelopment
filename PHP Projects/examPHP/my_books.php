<?php

require_once './common.php';

$bookRepository= new \App\Repository\BookRepository($pdoDB,$dataBinder);
$bookService= new \App\Service\BookService($bookRepository);

$userRepository= new \App\Repository\UserRepository($pdoDB);
$userService= new \App\Service\UserService($userRepository);

$bookHttpHandler=new \App\Http\BookHttpHandler($template,$dataBinder);
$bookHttpHandler->myBooks($bookService,$userService);