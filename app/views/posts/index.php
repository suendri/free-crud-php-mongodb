<?php /** @var array $data */ ?>

<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
      <div>
            <h1 class="h3 mb-1">Posts</h1>
            <p class="text-secondary mb-0">Kelola konten post berdasarkan kategori.</p>
      </div>
      <a href="<?php echo url('/posts/input'); ?>" class="btn btn-primary">Tambah Post</a>
</div>

<div class="table-card">
      <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                  <thead class="table-light">
                        <tr>
                              <th style="width: 80px;">No</th>
                              <th>Kategori</th>
                              <th>Judul</th>
                              <th class="text-end" style="width: 180px;">Aksi</th>
                        </tr>
                  </thead>
                  <tbody>
                        <?php foreach ($data['rows'] as $index => $row) { ?>
                              <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><span class="badge text-bg-light"><?php echo e($row['cat_name']); ?></span></td>
                                    <td><?php echo e($row['post_title']); ?></td>
                                    <td>
                                          <div class="d-flex justify-content-end gap-2">
                                                <a href="<?php echo url('/posts/edit/' . $row['post_id']); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                                <form action="<?php echo url('/posts/delete/' . $row['post_id']); ?>" method="post" onsubmit="return confirm('Hapus post ini?')">
                                                      <?php echo csrf_field(); ?>
                                                      <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                                </form>
                                          </div>
                                    </td>
                              </tr>
                        <?php } ?>
                  </tbody>
            </table>
      </div>
</div>
