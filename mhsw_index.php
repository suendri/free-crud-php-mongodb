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
$rows = $mhsw->tampil();

?>

<h2>
	DATA MAHASISWA
	<a class="btn btn-primary float-right" href="<?php echo URL; ?>/mahasiswa/create">
		<i class="fa fa-plus mr-2"></i> Tambah
	</a>
</h2>
<table class="table table-bordered table-sm" id="dtb" data-form="dataForm">
	<thead>
		<tr>
			<th>NO</th>
			<th>NIM</th>
			<th>NAMA</th>
			<th>PRODI</th>
			<th>AKSI</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=0; foreach ($rows as $row) { $no++; ?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $row['mhsw_nim']; ?></td>
				<td><?php echo $row['mhsw_nama']; ?></td>
				<td><?php echo $row['mhsw_prodi']; ?></td>
				<td>
					<div class="d-flex">
						<a href="<?php echo URL; ?>/mahasiswa/edit/<?php echo $row['_id']; ?>" class="btn btn-sm btn-warning">
							<i class="fa fa-edit"></i> EDIT
						</a>
						<a href="<?php echo URL; ?>/mahasiswa/show/<?php echo $row['_id']; ?>" class="btn btn-sm btn-info ml-2">
							<i class="fa fa-info-circle"></i> DETAIL
						</a>
						<form method="POST" action="<?php echo URL; ?>/mhsw_proses.php" id="deleteForm">
							<input type="hidden" name="_id" value="<?php echo $row['_id']; ?>">
							<input type="hidden" name="delete">
							<button class="btn btn-danger btn-sm ml-2">
								<i class="fa fa-trash"></i> HAPUS
							</button>
						</form>
					</div>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<!-- Modal hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deleteModalTitle"><i class="fe fe-trash"></i> KONFIRMASI HAPUS</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Apakah anda yakin menghapus data ini?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">
					<i class="fa fa-arrow-left"></i> BATAL
				</button>
				<button type="button" class="btn btn-danger" id="btn-delete-confirm">
					<i class="fa fa-trash"></i> HAPUS
				</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal hapus -->

<script>	
	$(document).ready(function(){
		$('table[data-form="dataForm"]').on('click', '#deleteForm', function(e){
			e.preventDefault();
			var $form = $(this);
			$('#deleteModal').modal({ backdrop: 'static', keyboard: false }).on('click', '#btn-delete-confirm', function(){
				$form.submit();
			});
		});
	});
</script>