<?php /** @var \App\DTO\EditDTO $data */ ?>
<h1>ADD NEW BOOK</h1>

<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<div><a href="profile.php">My Profile</a></div>
<form method="post">
    <div>
        <label>
            Book Title: <input type="text" name="title"  minlength="3" maxlength="50" value="<?= $data->getBook()!==null ? $data->getBook()->getTitle(): '' ?>" />
        </label>
    </div>
    <div>
        <label>
            Book Author: <input type="text" name="author"  minlength="3" maxlength="50" value="<?= $data->getBook()!==null ? $data->getBook()->getAuthor(): '' ?>" />
        </label>
    </div>
    <div>
        <label>
            Description: <input type="text" name="description"  minlength="10" maxlength="10000" value="<?= $data->getBook()!==null ? $data->getBook()->getDescription(): '' ?>" />
        </label>
    </div>
    <div>
        <label>
            Image URL: <input type="text" name="image" value="<?= $data->getBook()!==null ? $data->getBook()->getImage(): '' ?>" />
        </label>
    </div>
    <div>
        <label>
            Genre: <select name="genre_id">
                <option></option>
                <?php foreach ($data->getGenres() as $genre): ?>
                    <option value="<?= $genre->getGenreId(); ?>"><?= $genre->getName(); ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </div>
    <div>
        <input type="submit" name="Add" value="Add"/>
    </div>
</form>