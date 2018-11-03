<?php /** @var \App\Data\UserDTO $data */ ?>
<h1>YOUR PROFILE</h1>

<form method="post">
    <div>
        <label>
            Username: <input type="text" name="username" value="<?=$data->getUsername(); ?>" />
        </label>
    </div>
    <div>
        <label>
            Password: <input type="text"  required=required   name="password" />
        </label>
    </div>
    <div>
        <label>
            First Name: <input type="text" name="firstName" value="<?=$data->getFirstName(); ?>"/>
        </label>
    </div>
    <div>
        <label>
            Last Name: <input type="text" name="lastName" value="<?=$data->getLastName(); ?>"/>
        </label>
    </div>
    <div>
        <label>
            Birthday: <input type="text" name="bornOn" value="<?=$data->getBornOn(); ?>"/>
        </label>
    </div>
    <input type="submit" name="edit" value="Edit"/>
</form>

<span>You can <a href="logout.php">logout</a> or see <a href="allUsers.php">all users.</a></span>