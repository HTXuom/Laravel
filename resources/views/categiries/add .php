<h1>Thêm chuyên mục</h1>
<form method="POST" action="<?php echo route('categories.add'); ?>">
    <div>
        <input type="text" name="category_name" placeholder="tên chuyên mục">
        <?php echo csrf_field(); ?>
        <?php echo csrf_token(); ?>
        <button type="submit"> thêm chuyên mục </button>

    </div>

</form>