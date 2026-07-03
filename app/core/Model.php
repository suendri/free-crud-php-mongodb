<?php

/**
 * https://github.com/suendri
 * --
 * e-mail : suendri@gmail.com
 * WA     : 62852-6361-6901
 * --
 */

namespace App\Core;

use MongoDB\Client;

class Model
{
	protected object $db;

	public function __construct()
	{
		try {
			$this->db = (new Client("mongodb://localhost:27017"))->dbcrud;
		} catch (\Throwable $e) {
			die("error! " . $e->getMessage());
		}
	}
}
