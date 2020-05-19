<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<h2>HOME</h2>

<?php if (isset($_SESSION['login_error'])) { ?>
	
	<div class="alert alert-danger"><?php echo $_SESSION['login_error']; ?></div>

<?php } ?>

<div class="alert alert-info">
	Create Read Update and Delete with PHP using PDO and Database MongoDB
	<div>Demo <strong>Username : admin, Password: admin</strong></div>
</div>

<div class="alert alert-warning">
	Anda membutuhkan MongoDB Enterprise atau Community Server atau MongoDB Atlas dan Koneksi Internet untuk 
	menjalankan program ini.
</div>

<?php unset($_SESSION['login_error']);