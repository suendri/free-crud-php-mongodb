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

class Controller {

	protected object $db;

	public function __construct()
	{

        if (session_id() == "") {
            session_start();
        }

		try {

			// ----> Database local : dbcrudphpmongo
			// $this->db = (new MongoDB\Client("mongodb://localhost:27017"))->dbcrudphpmongo;

			// ----> Database cloud : dbcrudphpmongo
			$this->db = (new MongoDB\Client('mongodb://mr_sue01:pwrbnRGVEHSLuwtE@clusterlatihan-shard-00-00-luxwt.gcp.mongodb.net:27017,clusterlatihan-shard-00-01-luxwt.gcp.mongodb.net:27017,clusterlatihan-shard-00-02-luxwt.gcp.mongodb.net:27017/dbcrudphpmongo?replicaSet=Clusterlatihan-shard-0&ssl=true&authSource=admin'))->dbcrudphpmongo;
		
		} catch (Exception $e) {
			exit ("Error! " . $e->getMessage());
		}
	}
}