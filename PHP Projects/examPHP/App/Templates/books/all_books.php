<?php /** @var \App\DTO\BookDTO[]  $data*/ ?>
<h1>All Books</h1>


<div><a href="add_book.php">Add new book</a>
    | <a href="profile.php">My profile</a>
    | <a href="logout.php">logout</a>
</div>
<br/>
<table border="2" style="background-color: rosybrown">
    <thead>
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Added by User</th>
        <th>Details</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row->getTitle(); ?></td>
            <td><?= $row->getAuthor(); ?></td>
            <td><?= $row->getGenre()->getName(); ?></td>
            <td><?= $row->getUser()->getUsername(); ?></td>
            <td><a href="view.php?id=<?= $row->getBookId();?>">Details</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>