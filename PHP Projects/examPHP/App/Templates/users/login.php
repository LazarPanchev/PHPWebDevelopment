<?php /** @var \App\DTO\UserDTO $data */ ?>
<h1>Login</h1>

<?php foreach ($errors as $error): ?>
    <p style="color: red"><?=$error;?></p>
<?php endforeach;  ?>
<?php if ($successMessage!==null): ?>
    <p style="color: green"><?=$successMessage;?></p>
<?php endif;  ?>

<form method="post">
    <div>
        Username:<label>
            <input type="text" name="username"  required="required" value="<?= $data!==null ? $data->getUsername(): '' ?>"/>
        </label>
    </div>
    <div>
        Password:<label>
            <input type="password" name="password" required="required" value="<?= $data!==null ? $data->getPassword(): '' ?>" />
        </label>
    </div>
    <div>
        <input type="submit" name="Login" value="Login Now!" />
    </div>
</form>
