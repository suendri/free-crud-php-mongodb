<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php 

/**
 * Gosoftware Media Indonesia 2020
 * --
 * --
 * http://gosoftware.web.id
 * http://phpbego.wordpress.com
 * e-mail : cs@gosoftware.web.id
 * WA : 6285263616901
 * --
 * --
 */

$mhsw = new App\Mahasiswa();

?>

<h2>TAMBAH MAHASISWA</h2>
<form method="POST" action="<?php echo URL; ?>/mhsw_proses.php">
	<div class="form-group row">
		<label class="col-sm-2">NIM</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="mhsw_nim" placeholder="NIM" required="" autofocus="">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-2">NAMA</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="mhsw_nama" placeholder="Nama" required="">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-2">ALAMAT</label>
		<div class="col-sm-10">
			<textarea rows="3" class="form-control" name="mhsw_alamat"></textarea>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-2">PROGRAM STUDI</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="mhsw_prodi" placeholder="Program Studi">
		</div>
	</div>
	<div class="form-group float-right">
		<a href="<?php echo URL; ?>/mahasiswa" class="btn btn-primary">
			<i class="fa fa-arrow-left mr-2"></i> KEMBALI
		</a>
		<button class="btn btn-success" type="submit" name="input">
			<i class="fa fa-save mr-2"></i> SIMPAN
		</button>
	</div>	
</form>
