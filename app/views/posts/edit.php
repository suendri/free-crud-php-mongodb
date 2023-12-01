<h2>Edit Post</h2>

<form action="<?php echo URL; ?>/posts/update" method="post">
<input type="hidden" name="id" value="<?php echo $data['row']['_id']; ?>">
    <table>
        <tr>
            <td>KATEGORI</td>
            <td>
                <select name="post_id_cat">
                    <?php foreach ($data['optcat'] as $opt) { ?>
                        <option value="<?php echo $opt['_id']; ?>" <?php echo $opt['_id'] == $data['row']['post_categories']['cat_id'] ? "selected" : ""; ?>><?php echo $opt['cat_name']; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>TITLE</td>
            <td><input type="text" name="post_title" value="<?php echo $data['row']['post_title']; ?>" required></td>
        </tr>
        <tr>
            <td>TEXT</td>
            <td>
                <textarea name="post_text" cols="30" rows="10"><?php echo $data['row']['post_text']; ?></textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn_save" value="SAVE"></td>
        </tr>
    </table>
</form>