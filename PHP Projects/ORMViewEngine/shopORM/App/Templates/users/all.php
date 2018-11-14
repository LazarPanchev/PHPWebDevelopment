<?php /** @var \App\Data\UserDTO[] $data */ ?>
<h1>All users</h1>

<table border="2" style="color: rebeccapurple">
    <thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>FullName</th>
        <th>BornOn</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $item): ?>
        <tr>
            <td><?=$item->getId(); ?></td>
            <td><?=$item->getUsername(); ?></td>
            <td><?=$item->getFirstName() . " " . $item->getLastName(); ?></td>
            <td><?=$item->getBornOn(); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br />
<span>Go back to <a href="profile.php">your profile.</a></span>