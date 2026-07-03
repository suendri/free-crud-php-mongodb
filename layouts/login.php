<?php /** @var string $view */ ?>

<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Suendri">
	<title>Free CRUD PHP MongoDB | Login</title>
	<link rel="shortcut icon" href="<?php echo asset('img/favicon.ico'); ?>" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo asset('css/style.css'); ?>">
</head>

<body class="auth-page">
	<main class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
		<div class="auth-shell row g-0 w-100">
			<section class="col-lg-6 auth-panel text-white p-4 p-md-5 d-flex flex-column justify-content-between">
				<div>
					<div class="badge text-bg-light text-dark mb-3">MVC Sederhana</div>
					<h1 class="display-6 fw-semibold mb-3">Free CRUD PHP MongoDB</h1>
					<p class="lead mb-0">Aplikasi latihan perkuliahan dengan PHP OOP, MVC sederhana, MongoDB, login, role operator, dan admin.</p>
				</div>
				<div class="small opacity-75 mt-5">Bootstrap 5.3.8 · PHP MongoDB</div>
			</section>
			<section class="col-lg-6 bg-white p-4 p-md-5">
				<?php if ($message = $_SESSION['_flash']['success'] ?? null) { unset($_SESSION['_flash']['success']); ?>
					<div class="alert alert-success"><?php echo e($message); ?></div>
				<?php } ?>
				<?php if ($message = $_SESSION['_flash']['error'] ?? null) { unset($_SESSION['_flash']['error']); ?>
					<div class="alert alert-danger"><?php echo e($message); ?></div>
				<?php } ?>

				<?php require_once ROOT . "app/views/" . $view . ".php"; ?>
			</section>
		</div>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
