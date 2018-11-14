<form method="post">
    <input type="hidden" name="product_id" value="<?=$product['product_id']?>" />
    <table>
        <tr>
            <th>Product Name:</th>
            <td><input type="text" name="product_name" value="<?= $product['product_name'] ?>"/></td>
        </tr>
        <tr>
            <th>Product Price:</th>
            <td><input type="number" name="price" value="<?= $product['price'] ?>"/></td>
        </tr>
        <tr>
            <th>Description:</th>
            <td><input type="text" name="description" value="<?= $product['description'] ?>"/></td>
        </tr>
        <tr>
            <th>Category:</th>
            <td>
                <select name="cat_id">
                    <option></option>
                    <?php foreach ($categories as $category): ?>
                        <?php $selected = $product['cat_id'] == $category['cat_id'] ? 'selected' : ''; ?>
                        <option value="<?= $category['cat_id'] ?>" <?= $selected ?>><?= $category['cat_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <?php if ($product['product_id']): ?>
                    <button type="submit" name="edit" value="1">Edit</button>
                <?php else: ?>
                    <button type="submit" name="create" value="2">Create</button>
                <?php endif; ?>
            </td>
        </tr>
    </table>
</form>