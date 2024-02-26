<h1>Thêm chuyên mục</h1>
<form method="POST" action="<?php echo route('categories.add'); ?>" enctype="multipart/form-date">
    <div>
        <input type="file" name="photo" id="" />
    </div>
    <input type="text" name="category_name" placeholder="tên chuyên mục">
    value="<?php echo old('category_name', 'Mặc định'); ?>">
    <?php echo csrf_field(); ?>
    <?php echo csrf_token(); ?>
    <button type="submit">Upload </button>



</form>