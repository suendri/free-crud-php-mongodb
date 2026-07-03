<div class="mb-4">
    <h1 class="h3 mb-1">Tambah Category</h1>
    <p class="text-secondary mb-0">Masukkan nama kategori baru.</p>
</div>

<div class="table-card p-4">
    <form action="<?php echo url('/categories/save'); ?>" method="post" class="vstack gap-3">
        <?php echo csrf_field(); ?>
        <div>
            <label for="cat_name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="cat_name" name="cat_name" required>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-primary">Simpan</button>
            <a href="<?php echo url('/categories'); ?>" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
