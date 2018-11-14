<?php /** @var \TaskManagement\DTO\EditDTO $data */ ?>
<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<h1>Add new task</h1>

<form method="post">
    <div>
        <label>
<!--            Title: <input type="text" name="title" minlength="3" maxlength="50"/>-->
            Title: <input type="text" name="title" value="<?= $data != null ? $data->getTask()->getTitle() : "" ?>"/>
        </label>
    </div>
    <div>
        <label>
            Category: <select name="categoryId">
                <option></option>
                <?php foreach ($data->getCategories() as $category): ?>
                    <option value="<?=$category->getCatId(); ?>"><?= $category->getName(); ?></option>
                <?php endforeach; ?>
                      </select>
        </label>
    </div>
    <div>
        <label>
            Description: <input type="text" name="description" minlength="10" maxlength="10000" value="<?= $data != null ? $data->getTask()->getDescription() : "" ?>"/>
        </label>
    </div>
    <div>
        <label>
            Location: <input type="text" name="location" minlength="3" maxlength="100" value="<?= $data != null ? $data->getTask()->getLocation() : "" ?>" />
        </label>
    </div>
    <div>
        <label>
            Started On: <input type="date" name="startedOn" required="required" value="<?= $data != null ? $data->getTask()->getStartedOn() : "" ?>" />
        </label>
    </div>
    <div>
        <label>
            Due date: <input type="date" name="dueDate" required="required"    value="<?= $data != null ? $data->getTask()->getDueDate() : "" ?>"/>
        </label>
    </div>
    <div>
        <label>
            <input type="submit" name="save" value="Save" />
        </label>
    </div>
</form>
<br />
<span><a href="dashboard.php">List</a></span>