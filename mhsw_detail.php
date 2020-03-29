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
$row = $mhsw->detail($id);
?>

<h2>
	DETAIL MAHASISWA
	<a href="<?php echo URL; ?>/mahasiswa" class="btn btn-primary float-right">
		<i class="fa fa-arrow-left mr-2"></i> KEMBALI
	</a>
</h2>
<table class="table table-striped">
	<tr>
		<th style="width: 100px;">ID</th>
		<td><?php echo $row['_id']; ?></td>
	</tr>
	<tr>
		<th>NIM</th>
		<td><?php echo $row['mhsw_nim']; ?></td>
	</tr>
	<tr>
		<th>NAMA</th>
		<td><?php echo $row['mhsw_nama']; ?></td>
	</tr>
	<tr>
		<th>ALAMAT</th>
		<td><?php echo $row['mhsw_alamat']; ?></td>
	</tr>
	<tr>
		<th>DIBUAT</th>
		<td><?php echo \Carbon\Carbon::parse($row['created_at'])->formatLocalized('%e %B %Y %H:%M:%S'); ?></td>
	</tr>
	<tr>
		<th>DIEDIT</th>
		<td><?php echo $row['updated_at'] != "" ? \Carbon\Carbon::parse($row['updated_at'])->formatLocalized('%e %B %Y %H:%M:%S') : ""; ?></td>
	</tr>
</table>