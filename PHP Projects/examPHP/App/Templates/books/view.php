<?php /** @var  \App\DTO\BookDTO $data */ ?>
<h1>VIEW BOOK</h1>

<div><a href="profile.php">My profile</a></div>
<br />
<div>
    <p><strong>Book Title: </strong><?= $data->getTitle(); ?></p>
</div>
<div>
    <p><strong>Book Author: </strong><?= $data->getAuthor(); ?></p>
</div>
<div>
    <p><strong>Description: </strong><?= $data->getDescription(); ?></p>
</div>
<div>
    <p><strong>Genre: </strong><?= $data->getGenre()->getName(); ?></p>
</div>
<img src="<?= $data->getImage();?>" height="300px" width="250px" border="2px" style="border-color: black"  />