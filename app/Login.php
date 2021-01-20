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

class Login extends Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{

		$user_name = $_POST['user_name'];
		$user_password = $_POST['user_password'];

		$collection = $this->db->col_users;
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

}
