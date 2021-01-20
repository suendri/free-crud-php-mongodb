<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="sistem,crud,php,mongodb,phpbego,gosoftware">
	<meta name="description" content="Create Read Update and Delete with PHP and Database MongoDB">
	<meta name="author" content="Suendri">

	<title>Create Read Update and Delete with PHP and Database MongoDB</title>
	<link href="<?php echo URL; ?>/layout/assets/images/favicon.ico" rel="shortcut icon">
	<link rel="stylesheet" href="<?php echo URL; ?>/layout/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo URL; ?>/layout/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo URL; ?>/layout/assets/css/datatables.min.css">
	<link rel="stylesheet" href="<?php echo URL; ?>/layout/assets/css/style.css">

	<script src="<?php echo URL; ?>/layout/assets/js/jquery-3.5.1.min.js"></script>
	<script src="<?php echo URL; ?>/layout/assets/js/datatables.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#dtb').DataTable({
				/*responsive: true */
				"ordering": false
			});
		});
	</script>
</head>

<body>

	<nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #244f91;">
		<div class="container">
			<a class="navbar-brand font-weight-bold" href="<?php echo URL; ?>">PHPMONGO</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo URL; ?>">Home</a>
					</li>
					<?php if (App\Controller::session('login') == true) { ?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo URL; ?>/mahasiswa">Mahasiswa</a>
						</li>
					<?php } ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo URL; ?>/about">About</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<?php if (!App\Controller::session('login')) { ?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo URL; ?>/login"><i class="fa fa-sign-in mr-2"></i> Login</a>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<a class="nav-link" href="#"><i class="fa fa-user mr-2"></i> <?php echo App\Controller::session('user_name') ?></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo URL; ?>/logout"><i class="fa fa-sign-out mr-2"></i> Logout</a></a>
						</li>
					<?php } ?>
				</ul>

			</div>
		</div>
	</nav>

	<div class="container main mt-2">

		<main>
			<div class="row">
				<div class="col">
					<?php require_once "inc/web.php"; ?>
				</div>
			</div>
		</main>

		<footer>
			Copyright © <?php echo date('Y') ?> All rights reserved.
			<div><a href="http://gosoftware.web.id/" target="_blank">http://gosoftware.web.id</a></div>
		</footer>

	</div>
	<script src="<?php echo URL; ?>/layout/assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>