<?php /** @var \TaskManagement\DTO\TaskDTO[] $data */ ?>
<h1>All Tasks</h1>

<a href="addTask.php">Add new task</a> |
<a href="logout.php">logout</a><br />

<br />
<table border="2" style="background-color: bisque">
    <thead>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $task): ?>
        <tr>
            <td><?= $task->getTitle() ?></td>
            <td><?= $task->getCategory()->getName(); ?></td>
            <td><?= $task->getAuthor()->getUsername(); ?></td>
            <td><a href="editTask.php?id=<?= $task->getTaskId(); ?>">edit task</a></td>
            <td><a href="deleteTask.php?id=<?= $task->getTaskId(); ?>">delete task</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>