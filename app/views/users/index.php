<?php /** @var array $data */ ?>

<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
      <div>
            <h1 class="h3 mb-1">Users & Role</h1>
            <p class="text-secondary mb-0">Admin dapat menambah user dan mengubah operator menjadi admin.</p>
      </div>
      <a href="<?php echo url('/users/input'); ?>" class="btn btn-primary">Tambah User</a>
</div>

<div class="table-card">
      <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                  <thead class="table-light">
                        <tr>
                              <th style="width: 80px;">No</th>
                              <th>Email</th>
                              <th>Nama</th>
                              <th>Role</th>
                              <th class="text-end" style="width: 260px;">Aksi</th>
                        </tr>
                  </thead>
                  <tbody>
                        <?php foreach ($data['rows'] as $index => $row) { ?>
                              <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($row['user_email']); ?></td>
                                    <td><?php echo e($row['user_full_name']); ?></td>
                                    <td>
                                          <form action="<?php echo url('/users/role/' . $row['user_id']); ?>" method="post" class="d-flex gap-2">
                                                <?php echo csrf_field(); ?>
                                                <select name="role" class="form-select form-select-sm" aria-label="Role user" <?php echo (string) $row['user_id'] === (string) ($_SESSION['user_id'] ?? '') ? 'disabled' : ''; ?>>
                                                      <option value="operator" <?php echo ($row['user_role'] ?? 'operator') === 'operator' ? 'selected' : ''; ?>>Operator</option>
                                                      <option value="admin" <?php echo ($row['user_role'] ?? 'operator') === 'admin' ? 'selected' : ''; ?>>Admin</option>
                                                </select>
                                                <button class="btn btn-sm btn-outline-success" <?php echo (string) $row['user_id'] === (string) ($_SESSION['user_id'] ?? '') ? 'disabled' : ''; ?>>Simpan</button>
                                          </form>
                                    </td>
                                    <td>
                                          <div class="d-flex justify-content-end gap-2">
                                                <a href="<?php echo url('/users/edit/' . $row['user_id']); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                                <form action="<?php echo url('/users/delete/' . $row['user_id']); ?>" method="post" onsubmit="return confirm('Hapus user ini?')">
                                                      <?php echo csrf_field(); ?>
                                                      <button class="btn btn-sm btn-outline-danger" <?php echo (string) $row['user_id'] === (string) ($_SESSION['user_id'] ?? '') ? 'disabled' : ''; ?>>Hapus</button>
                                                </form>
                                          </div>
                                    </td>
                              </tr>
                        <?php } ?>
                  </tbody>
            </table>
      </div>
</div>
