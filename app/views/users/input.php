<?php /** @var array $data */ ?>

<div class="mb-4">
    <h1 class="h3 mb-1">Tambah User</h1>
    <p class="text-secondary mb-0">Admin dapat membuat akun operator atau admin.</p>
</div>

<div class="table-card p-4">
    <form action="<?php echo url('/users/save'); ?>" method="post" class="vstack gap-3">
        <?php echo csrf_field(); ?>
        <div>
            <label for="full_name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="full_name" name="full_name" required>
        </div>
        <div>
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div>
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" minlength="6" required>
        </div>
        <div>
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role">
                <option value="operator">Operator</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-primary">Simpan</button>
            <a href="<?php echo url('/users'); ?>" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
