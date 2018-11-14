<?php /**@var \DTO\ProductDTO $data
*
 */
?>
<form method="post">
    <input type="hidden" name="product_id" value="<?= $data->getProductId()??''?>"/>
    <table border="2">
        <tr>
            <th>Name:</th>
            <td><input type="text" name="product_name" value="<?=$data->getProductName()??'' ?>"/></td>
        </tr>
        <tr>
            <th>Price:</th>
            <td><input type="text" name="price" value="<?= $data->getPrice()??'' ?>"/></td>
        </tr>
        <tr>
            <th>Description:</th>
            <td><textarea name="description"><?= $data->getDescription()??'' ?></textarea></td>
        </tr>
        <tr>
            <th>Category:</th>
            <td>
                <select name="cat_id">
                    <option></option>
                    <?php foreach ($data->getCatList() as $category): ?>
                        <?php $selected = $data->getCategoryId()??'' == $category->getCategoryId() ? 'selected' : '';?>
                        <option value="<?= $category->getCategoryId()?>" <?= $selected ?>><?= $category->getCategoryName() ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <?php if ($data->getProductId()): ?>
                    <button type="submit" name="edit"" value="1">Edit</button>
                <?php else: ?>
                    <button type="submit" name="save" value="1">Create</button>
                <?php endif; ?>
            </td>
        </tr>
    </table>
</form>


