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

namespace App;
use MongoDB;
use Carbon\Carbon;

class Mahasiswa extends Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function tampil()
	{

		$collection = $this->db->tb_mhsw;
		$rows = $collection->find([]);

		return $rows;
	}

	public function input()
	{

		$mhsw_nim = $_POST['mhsw_nim'];
		$mhsw_nama = $_POST['mhsw_nama'];
		$mhsw_alamat = $_POST['mhsw_alamat'];
		$mhsw_prodi = $_POST['mhsw_prodi'];
		$created_at = Carbon::now()->toDateTimeString();
		$updated_at = "";

		$collection = $this->db->tb_mhsw;
		$collection->insertOne([
			'mhsw_nim' => $mhsw_nim,
			'mhsw_nama' => $mhsw_nama,
			'mhsw_alamat' => $mhsw_alamat,
			'mhsw_prodi' => $mhsw_prodi,
			'created_at' => $created_at,
			'updated_at' => $updated_at
		]);

		return false;
	}

	public function edit($id)
	{

		$collection = $this->db->tb_mhsw;
		$row = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

		return $row;
	}

	public function update()
	{
		$_id = $_POST['_id'];
		$mhsw_nim = $_POST['mhsw_nim'];
		$mhsw_nama = $_POST['mhsw_nama'];
		$mhsw_alamat = $_POST['mhsw_alamat'];
		$mhsw_prodi = $_POST['mhsw_prodi'];
		$updated_at = Carbon::now()->toDateTimeString();

		$collection = $this->db->tb_mhsw;
		$collection->updateOne(
			['_id' => new MongoDB\BSON\ObjectId($_id)],
			['$set' => [
				'mhsw_nim' => $mhsw_nim, 
				'mhsw_nama' => $mhsw_nama,
				'mhsw_alamat' => $mhsw_alamat,
				'mhsw_prodi' => $mhsw_prodi,
				'updated_at' => $updated_at
			]]
		);

		return false;
	}

	public function detail($id)
	{

		$collection = $this->db->tb_mhsw;
		$row = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

		return $row;
	}

	public function delete()
	{

		$_id = $_POST['_id'];

		$collection = $this->db->tb_mhsw;
		$collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($_id)]);

		return false;
	}
}