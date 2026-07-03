<div class="p-3">
	<div class="d-flex align-items-center gap-2 mb-4">
		<img src="<?php echo asset('img/delitekno.png'); ?>" class="brand" alt="Brand">
		<div>
			<div class="fw-semibold">CRUD MongoDB</div>
			<div class="small text-secondary">MVC Sederhana</div>
		</div>
	</div>
	<nav class="nav nav-pills flex-column gap-1">
		<a class="nav-link <?php echo is_active_menu('dashboard') ? 'active' : ''; ?>" href="<?php echo url('/dashboard'); ?>">Dashboard</a>
		<a class="nav-link <?php echo is_active_menu('categories') ? 'active' : ''; ?>" href="<?php echo url('/categories'); ?>">Categories</a>
		<a class="nav-link <?php echo is_active_menu('posts') ? 'active' : ''; ?>" href="<?php echo url('/posts'); ?>">Posts</a>
		<?php if (App\Core\Controller::isAdmin()) { ?>
			<a class="nav-link <?php echo is_active_menu('users') ? 'active' : ''; ?>" href="<?php echo url('/users'); ?>">Users & Role</a>
		<?php } ?>
	</nav>
</div>
