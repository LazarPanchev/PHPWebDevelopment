<?php /** @var \App\DTO\UserDTO $data */ ?>
<h1>REGISTER NEW USER</h1>

<?php foreach ($errors as $error): ?>
 <p style="color: red"><?=$error;?></p>
<?php endforeach;  ?>

<form method="post">
    <div>
        Username:<label>
            <input type="text" name="username" minlength="4" value="<?= $data!==null ? $data->getUsername(): '' ?>"  />
        </label>
    </div>
    <div>
        Password:<label>
            <input type="password" name="password" minlength="4" />
        </label>
    </div>
    <div>
        Confirm Password:<label>
            <input type="password"  name="confirm_password" minlength="4" />
        </label>
    </div>
    <div>
        Full Name:<label>
            <input type="text" name="full_name" minlength="5" value="<?= $data!==null ? $data->getFullName(): '' ?>" />
        </label>
    </div>
    <div>
        Born On:<label>
            <input type="date" required="required" name="born_on" value="<?= $data!==null ? $data->getBornOn(): '' ?>"  />
        </label>
    </div>
    <div><input type="submit" name="Register" value="Register!" />
    </div>
</form>