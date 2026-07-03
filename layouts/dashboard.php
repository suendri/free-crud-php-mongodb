<?php /** @var string $view */ ?>

<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Suendri">
	<title>Free CRUD PHP MongoDB | Dashboard</title>
	<link rel="shortcut icon" href="<?php echo asset('img/favicon.ico'); ?>" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo asset('css/style.css'); ?>">
</head>

<body class="dashboard-page">
	<nav class="navbar navbar-expand-lg bg-white border-bottom fixed-top">
		<div class="container-fluid">
			<button class="btn btn-outline-secondary d-lg-none me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">Menu</button>
			<a class="navbar-brand fw-semibold" href="<?php echo url('/dashboard'); ?>">Free CRUD</a>
			<div class="ms-auto d-flex align-items-center gap-3">
				<div class="text-end d-none d-sm-block">
					<div class="small fw-semibold"><?php echo e(App\Config::session('user_full_name')); ?></div>
					<div class="text-secondary small text-capitalize"><?php echo e(App\Config::session('user_role') ?? 'operator'); ?></div>
				</div>
				<form action="<?php echo url('/dashboard/logout'); ?>" method="post" class="m-0">
					<?php echo csrf_field(); ?>
					<button class="btn btn-outline-danger btn-sm">Logout</button>
				</form>
			</div>
		</div>
	</nav>

	<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
		<div class="offcanvas-header">
			<h5 class="offcanvas-title" id="mobileSidebarLabel">Navigasi</h5>
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body p-0">
			<?php require ROOT . "layouts/partials/sidebar.php"; ?>
		</div>
	</div>

	<aside class="sidebar d-none d-lg-block">
		<?php require ROOT . "layouts/partials/sidebar.php"; ?>
	</aside>

	<main class="dashboard-main">
		<div class="container-fluid py-4">
			<?php if ($message = $_SESSION['_flash']['success'] ?? null) { unset($_SESSION['_flash']['success']); ?>
				<div class="alert alert-success"><?php echo e($message); ?></div>
			<?php } ?>
			<?php if ($message = $_SESSION['_flash']['error'] ?? null) { unset($_SESSION['_flash']['error']); ?>
				<div class="alert alert-danger"><?php echo e($message); ?></div>
			<?php } ?>

			<?php require_once ROOT . "app/views/" . $view . ".php"; ?>
		</div>
	</main>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
