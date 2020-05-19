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

class User extends Controller {

	public function __construct()
	{
		parent::__construct();
	}


	public function tampil()
	{

		$collection = $this->db->tb_users;
		$rows = $collection->find([]);

		return $rows;

	}

	public function input()
	{
		
		$user_name = $_POST['user_name'];
		$user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
		$user_role = $_POST['user_role'];
		$created_at = Carbon::now()->toDateTimeString();
		$updated_at = "";

		if (!empty($user_name) AND !empty($user_password)) {

			$collection = $this->db->tb_users;
			$collection->insertOne([
				'user_name' => $user_name,
				'user_password' => $user_password,
				'user_role' => $user_role,
				'created_at' => $created_at,
				'updated_at' => $updated_at
			]);

		} 

		return false;
	}

	public function edit($id)
	{

		$collection = $this->db->tb_users;
		$row = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

		return $row;

	}

	public function update()
	{
		$_id = $_POST['_id'];
		$user_name = $_POST['user_name'];
		$user_role = $_POST['user_role'];
		$updated_at = Carbon::now()->toDateTimeString();

		$collection = $this->db->tb_users;

		if (!empty($user_name)) {

			if (!empty($_POST['user_password'])) {

				$user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);				
				$collection->updateOne(
					['_id' => new MongoDB\BSON\ObjectId($_id)],
					['$set' => [
						'user_name' => $user_name,
						'user_password' => $user_password,
						'user_role' => $user_role,
						'updated_at' => $updated_at
					]]
				);

			} else {

				$collection->updateOne(
					['_id' => new MongoDB\BSON\ObjectId($_id)],
					['$set' => [
						'user_name' => $user_name,
						'user_role' => $user_role,
						'updated_at' => $updated_at
					]]
				);
			}
		} 

		return false;
	}

	public function login()
	{

		$user_name = $_POST['user_name'];
		$user_password = $_POST['user_password'];

		$collection = $this->db->tb_users;
		$row = $collection->findOne(['user_name' => $user_name]);

		if (!empty($row) AND password_verify($user_password, $row['user_password'])) {

			$_SESSION['login']  = true;
			$_SESSION['user_id']  = $row['_id'];
			$_SESSION['user_name']  = $row['user_name'];
			$_SESSION['user_role'] = $row['user_role'];
		} else {
			$_SESSION['login_error'] = "Login tidak ditemukan!";
		}

		return false;
	}

	public function akun()
	{
		$_id = $_SESSION['user_id'];

		$collection = $this->db->tb_users;
		$row = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($_id)]);

		return $row;

	}

	public function akunUpdate()
	{
		$_id = $_POST['_id'];
		$user_name = $_POST['user_name'];

		$collection = $this->db->tb_users;

		if (!empty($user_name)) {

			if (!empty($_POST['user_password'])) {

				$user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);				
				$collection->updateOne(
					['_id' => new MongoDB\BSON\ObjectId($_id)],
					['$set' => [
						'user_name' => $user_name,
						'user_password' => $user_password,
						'user_role' => $user_role,
						'updated_at' => $updated_at
					]]
				);

			} else {

				$collection->updateOne(
					['_id' => new MongoDB\BSON\ObjectId($_id)],
					['$set' => [
						'user_name' => $user_name,
						'user_role' => $user_role,
						'updated_at' => $updated_at
					]]
				);
			}
		} 

		return false;
	}


}
