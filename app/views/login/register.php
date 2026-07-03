<div class="mb-4">
     <h2 class="h3 fw-semibold">Registrasi Operator</h2>
     <p class="text-secondary mb-0">Akun baru otomatis berstatus operator.</p>
</div>

<form action="<?php echo url('/login/store'); ?>" method="post" class="vstack gap-3">
     <?php echo csrf_field(); ?>
     <div>
          <label for="full_name" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" id="full_name" name="full_name" required>
     </div>
     <div>
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="nama@email.com" required>
     </div>
     <div>
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" minlength="6" required>
     </div>
     <button class="btn btn-primary w-100">Daftar</button>
</form>

<div class="border-top mt-4 pt-4 text-center">
     <span class="text-secondary">Sudah punya akun?</span>
     <a href="<?php echo url('/'); ?>">Login</a>
</div>
