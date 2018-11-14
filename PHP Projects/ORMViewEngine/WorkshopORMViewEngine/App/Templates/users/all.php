<?php /** @var \App\Data\UserDTO $user */  ?>
<h1>ALL USERS</h1>

<table border="1">
    <thead>
    <tr><th>Id</th><th>Username</th><th>Fullname</th><th>BornOn</th></tr>
    </thead>
    <tbody>
        <?php foreach ($data as $user):?>
            <tr>
                <td><?=$user->getId()?></td>
                <td><?=$user->getUsername()?></td>
                <td><?=$user->getFirstName() . " " . $user->getLastName()?></td>
                <td><?=$user->getBornOn()?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<div>Go back to <a href="profile.php">your profile.</a></div>