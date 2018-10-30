<form method="post">
    <input type="hidden" name="product_id" value="<?= $data['product']['product_id'] ?>"/>
    <table border="2">
        <tr>
            <th>Name:</th>
            <td><input type="text" name="product_name" value="<?=$data['product']['product_name'] ?>"/></td>
        </tr>
        <tr>
            <th>Price:</th>
            <td><input type="text" name="price" value="<?= $data['product']['price'] ?>"/></td>
        </tr>
        <tr>
            <th>Description:</th>
            <td><textarea name="description"><?= $data['product']['description'] ?></textarea></td>
        </tr>
        <tr>
            <th>Category:</th>
            <td>
                <select name="cat_id">
                    <option></option>
                    <?php foreach ($data['categories_model']->getList() as $category): ?>
                        <?php $selected = $data['product']['cat_id'] == $category['cat_id'] ? 'selected' : '';?>
                        <option value="<?= $category['cat_id'] ?>" <?= $selected ?>><?= $category['cat_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <?php if ($data['product']['product_id']): ?>
                    <button type="submit" name="edit" value="1">Edit</button>
                <?php else: ?>
                    <button type="submit" name="save" value="1">Create</button>
                <?php endif; ?>
            </td>
        </tr>
    </table>
</form>
</body>
</html>