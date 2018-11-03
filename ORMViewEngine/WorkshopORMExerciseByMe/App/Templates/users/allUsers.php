<?php /** @var \App\Data\UserDTO[] $data */   ?>
<h1>ALL USERS</h1>

<table border="2">
    <thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>FullName</th>
        <th>BornOn</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $user): ?>
        <tr>
            <td><?= $user->getId();?></td>
            <td><?= $user->getUsername();?></td>
            <td><?= $user->getFirstName() . " " . $user->getLastName();?></td>
            <td><?= $user->getBornOn();?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br>
<span>Go back to <a href="profile.php">your profile.</a> </span>
