<?php /** @var \App\DTO\UserDTO[] $data */ ?>
<h1>Hello, <?=$data[0]->getFullName(); ?></h1>
<br/>
<div><a href="add_book.php">Add new book</a> | <a href="logout.php">logout</a></div>
<br />
<div><a href="my_books.php">My Books</a></div>
<div><a href="all_books.php">All Books</a></div>
