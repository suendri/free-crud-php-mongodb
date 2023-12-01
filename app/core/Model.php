<?php

/**
 * https://github.com/suendri
 * --
 * e-mail : suendri@gmail.com
 * WA     : 62852-6361-6901
 * --
 */

namespace App\Core;

use MongoDB;

class Model
{

	protected object $db;

	public function __construct()
	{

		try {

			$this->db = (new MongoDB\Client("mongodb://localhost:27017"))->dbcrud;
		} catch (Exception $e) {
			die("error! " . $e->getMessage());
		}
	}

}
