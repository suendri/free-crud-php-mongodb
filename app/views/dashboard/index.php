<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
     <div>
          <h1 class="h3 mb-1">Dashboard</h1>
          <p class="text-secondary mb-0">Selamat datang, <?php echo e(App\Config::session('user_full_name')); ?>.</p>
     </div>
     <span class="badge text-bg-primary text-capitalize align-self-start align-self-md-center"><?php echo e(App\Config::session('user_role') ?? 'operator'); ?></span>
</div>

<div class="row g-3 mb-4">
     <div class="col-md-4">
          <div class="stat-card bg-white p-4">
               <div class="text-secondary small mb-2">Users</div>
               <div class="display-6 fw-semibold"><?php echo e($data['total_users'] ?? 0); ?></div>
          </div>
     </div>
     <div class="col-md-4">
          <div class="stat-card bg-white p-4">
               <div class="text-secondary small mb-2">Categories</div>
               <div class="display-6 fw-semibold"><?php echo e($data['total_categories'] ?? 0); ?></div>
          </div>
     </div>
     <div class="col-md-4">
          <div class="stat-card bg-white p-4">
               <div class="text-secondary small mb-2">Posts</div>
               <div class="display-6 fw-semibold"><?php echo e($data['total_posts'] ?? 0); ?></div>
          </div>
     </div>
</div>

<div class="table-card p-4">
     <h2 class="h5 mb-2">Alur MVC</h2>
     <p class="text-secondary mb-0">Controller menerima request, model menjalankan operasi MongoDB, lalu view menampilkan data dengan Bootstrap.</p>
</div>
