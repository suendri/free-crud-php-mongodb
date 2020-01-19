<?php

/**
 * Gosoftware Media Indonesia 2020
 * --
 * --
 * http://gosoftware.web.id
 * e-mail : cs@gosoftware.web.id
 * WA : 6285263616901
 * --
 * --
 */

namespace App;
use MongoDB;

class Controller {

	protected $db;

	public function __construct()
	{

        if (session_id() == "") {
            session_start();
        }

		try {
			// Database : dbcrudphpmongo
			$this->db = (new MongoDB\Client("mongodb://localhost:27017"))->dbcrudphpmongo;
		} catch (PDOException $e) {
			die ("Database tidak terhubung!");
		}
	}
}