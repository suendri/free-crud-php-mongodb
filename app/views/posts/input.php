<?php /** @var array $data */ ?>

<div class="mb-4">
    <h1 class="h3 mb-1">Tambah Post</h1>
    <p class="text-secondary mb-0">Pilih kategori dan tulis konten post.</p>
</div>

<div class="table-card p-4">
    <form action="<?php echo url('/posts/save'); ?>" method="post" class="vstack gap-3">
        <?php echo csrf_field(); ?>
        <div>
            <label for="post_id_cat" class="form-label">Kategori</label>
            <select class="form-select" id="post_id_cat" name="post_id_cat" required>
                <?php foreach ($data['optcat'] as $opt) { ?>
                    <option value="<?php echo e($opt['cat_id']); ?>"><?php echo e($opt['cat_name']); ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="post_title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="post_title" name="post_title" required>
        </div>
        <div>
            <label for="post_text" class="form-label">Teks</label>
            <textarea class="form-control" id="post_text" name="post_text" rows="8"></textarea>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-primary">Simpan</button>
            <a href="<?php echo url('/posts'); ?>" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
