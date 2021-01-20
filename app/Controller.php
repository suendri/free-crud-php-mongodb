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

		try {

			// ----> Database local : crudphpmongo
			$this->db = (new MongoDB\Client("mongodb://localhost:27017"))->crudphpmongo;

			// ----> Database cloud : crudphpmongo
			// ----> Cluster clusterlatihan
			//$this->db = (new MongoDB\Client('mongodb://username:password@clusterlatihan-shard-00-00-luxwt.gcp.mongodb.net:27017,clusterlatihan-shard-00-01-luxwt.gcp.mongodb.net:27017,clusterlatihan-shard-00-02-luxwt.gcp.mongodb.net:27017/crudphpmongo?replicaSet=Clusterlatihan-shard-0&ssl=true&authSource=admin'))->crudphpmongo;
		
		} catch (Exception $e) {
			exit ("Error! " . $e->getMessage());
		}
	}

	public static function session($key) {
		
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}
		
		return null;
	}
}