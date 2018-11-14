<?php /** @var TaskManagement\DTO\UserDTO $data */ ?>

<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<h1>REGISTER NEW USER</h1>
<br/>

<form method="post">
    <div>
        <label>
            Username: <input type="text" name="username" value="<?= $data != null ? $data->getUsername() : "" ?>"/>
        </label>
    </div>
    <div>
        <label>
            Password: <input type="password" name="password" />
        </label>
    </div>
    <div>
    <label>
        Confirm Password: <input type="password" name="confirmPassword"/>
    </label>
    </div>
    <div>
        <label>
            First Name: <input type="text" name="firstName" value="<?= $data != null ? $data->getFirstName() : "" ?>"/>
        </label>
    </div>
    <div>
        <label>
            Last Name: <input type="text" name="lastName" value="<?= $data != null ? $data->getLastName() : "" ?>"/>
        </label>
    </div>
    <div>
        <input type="submit" value="Register!" name="register" />
    </div>
</form>
