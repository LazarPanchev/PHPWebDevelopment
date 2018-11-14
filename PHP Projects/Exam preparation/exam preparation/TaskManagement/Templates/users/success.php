<?php /** @var \TaskManagement\DTO\userDTO $data */ ?>
<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<h1>Congratulations, <?=$data->getFirstName() . " " . $data->getLastName() ?></h1>
<br/>
<div><a href="login.php">Go to login</a>.</div>