<?php /** @var array $data */ ?>

<div class="mb-4">
    <h1 class="h3 mb-1">Edit User</h1>
    <p class="text-secondary mb-0">Kosongkan password jika tidak ingin mengubahnya.</p>
</div>

<div class="table-card p-4">
    <form action="<?php echo url('/users/update'); ?>" method="post" class="vstack gap-3">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" value="<?php echo e($data['row']['user_id']); ?>">
        <div>
            <label for="full_name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo e($data['row']['user_full_name']); ?>" required>
        </div>
        <div>
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo e($data['row']['user_email']); ?>" required>
        </div>
        <div>
            <label for="password" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="password" name="password" minlength="6">
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-primary">Update</button>
            <a href="<?php echo url('/users'); ?>" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
