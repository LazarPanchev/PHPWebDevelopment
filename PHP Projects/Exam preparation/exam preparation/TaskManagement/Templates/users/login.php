<?php /** @var TaskManagement\DTO\UserDTO|null $data */ ?>

<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>
<h1>USER LOGIN</h1>

<form method="post">
    <div>
        <label>
            Username: <input type="text" name="username" value="<?= $data != null ? $data->getUsername() : "" ?>"/>
        </label>
    </div>
    <div>
        <label>
            Password: <input type="password" name="password" value="<?= $data != null ? $data->getPassword() : "" ?>"/>
        </label>
    </div>
    <input type="submit"  name="login" value="Login!"/>
</form>