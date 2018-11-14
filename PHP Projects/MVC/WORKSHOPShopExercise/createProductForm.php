<form method="post">
    <table>
        <tr>
            <th>Product Name:</th>
            <td><input type="text" name="product_name""/></td>
        </tr>
        <tr>
            <th>Product Price:</th>
            <td><input type="text" name="price" "/></td>
        </tr>
        <tr>
            <th>Description:</th>
            <td><input type="text" name="description" "/></td>
        </tr>
        <tr>
            <th>Category:</th>
            <td>
                <select name="cat_id">
                    <option></option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['cat_id'] ?>" ><?= $category['cat_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                    <button type="submit" name="create" value="2">Create</button>
            </td>
        </tr>
    </table>
</form>




