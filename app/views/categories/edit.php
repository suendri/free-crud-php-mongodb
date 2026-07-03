<?php /** @var array $data */ ?>

<div class="mb-4">
    <h1 class="h3 mb-1">Edit Category</h1>
    <p class="text-secondary mb-0">Perbarui nama kategori.</p>
</div>

<div class="table-card p-4">
    <form action="<?php echo url('/categories/update'); ?>" method="post" class="vstack gap-3">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" value="<?php echo e($data['row']['cat_id']); ?>">
        <div>
            <label for="cat_name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="cat_name" name="cat_name" value="<?php echo e($data['row']['cat_name']); ?>" required>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-primary">Update</button>
            <a href="<?php echo url('/categories'); ?>" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
