<?php

/**
 * https://github.com/suendri
 * --
 * e-mail : suendri@gmail.com
 * WA     : 62852-6361-6901
 * --
 */

namespace App\Controllers;

use App\Core\Controller;

class Dashboard extends Controller
{
	public function __construct()
	{
		parent::cekLogin();
	}

	public function index()
	{
		$data = [
			'total_users' => count((new \App\Models\User())->show()),
			'total_categories' => count((new \App\Models\Category())->show()),
			'total_posts' => count((new \App\Models\Post())->show()),
		];

		$this->dashboard('dashboard/index', $data);
	}

	public function logout()
	{
		$this->requirePost();
		$this->validateCsrf();
		session_destroy();
		$this->redirect('/');
	}
}
