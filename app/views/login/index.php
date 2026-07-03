<div class="mb-4">
     <h2 class="h3 fw-semibold">Login</h2>
     <p class="text-secondary mb-0">Masuk sebagai operator atau admin.</p>
</div>

<form action="<?php echo url('/login/proses'); ?>" method="post" class="vstack gap-3">
     <?php echo csrf_field(); ?>
     <div>
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="nama@email.com" required>
     </div>
     <div>
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
     </div>
     <button class="btn btn-primary w-100">Login</button>
</form>

<div class="border-top mt-4 pt-4 text-center">
     <span class="text-secondary">Belum punya akun operator?</span>
     <a href="<?php echo url('/login/register'); ?>">Registrasi</a>
</div>
