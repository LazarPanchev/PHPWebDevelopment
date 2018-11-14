<?php /** @var \App\DTO\EditDTO $data */ ?>
<h1>EDIT BOOK</h1>

<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<div><a href="profile.php">My Profile</a></div>
<form method="post">
    <div>
        <label>
            Book Title: <input type="text" name="title" minlength="3" maxlength="50"
                               value="<?= $data->getBook() !== null ? $data->getBook()->getTitle() : '' ?>"/>
        </label>
    </div>
    <div>
        <label>
            Book Author: <input type="text" name="author" minlength="3" maxlength="50"
                                value="<?= $data->getBook() !== null ? $data->getBook()->getAuthor() : '' ?>"/>
        </label>
    </div>
    <div>
        <label>
            Description: <textarea
                    name="description" minlength="10" maxlength="10000" ><?= $data->getBook() !== null ? $data->getBook()->getDescription() : '' ?></textarea>
        </label>
    </div>
    <div>
        <label>
            Image URL: <input type="text" name="image"
                              value="<?= $data->getBook() !== null ? $data->getBook()->getImage() : '' ?>"/>
        </label>
    </div>
    <div>
        <label>
            Genre: <select name="genre_id">
                <?php foreach ($data->getGenres() as $genre): ?>
                    <?php if ($data->getBook()->getGenre()->getGenreId() === $genre->getGenreId()): ?>
                        <option selected="selected" value="<?= $genre->getGenreId(); ?>"><?= $genre->getName(); ?></option>
                    <?php else: ?>
                        <option value="<?= $genre->getGenreId(); ?>"><?= $genre->getName(); ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </label>
    </div>
    <?php if($data->getBook()->getImage()!==null): ?>
        <div>
            <img src="<?= $data->getBook()->getImage();?>" height="300px" width="250px" border="2px" style="border-color: black"  />
        </div>
    <?php else: ?>
            <div>Sorry! No current Image</div>
    <?php endif; ?>
    <div>
        <input type="submit" name="Edit" value="Edit"/>
    </div>
</form>