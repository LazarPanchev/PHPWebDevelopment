<?php /** @var \App\Data\UserDTO $data */ ?>
<h1>Your Profile</h1>

<form method="post">
    <div>
        Username: <label>
            <input type="text" required=required name="username" value="<?=$data->getUsername();?>" />
        </label>
    </div>
    <div>
        Password: <label>
            <input type="text" required=required name="password" />
        </label>
    </div>
    <div>
        First Name: <label>
            <input type="text" required=required name="firstName" value="<?=$data->getFirstName();?>"/>
        </label>
    </div>
    <div>
        Last Name: <label>
            <input type="text" name="lastName" value="<?=$data->getLastName();?>" />
        </label>
    </div>
    <div>
        Birthday: <label>
            <input type="text" name="bornOn" value="<?=$data->getBornOn();?>"/>
        </label>
    </div>
    <div>
        <input type="submit" value="Edit!" name="edit" />
    </div>
</form>

<span>You can <a href="logout.php">logout</a> or see <a href="users.php">all users.</a></span>