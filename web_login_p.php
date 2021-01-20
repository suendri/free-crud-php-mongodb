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

// Config
require_once "inc/config.php";

$user = new App\Login();

if (isset($_POST['login'])) {

	$user->login();
	header("location:" . URL . "/");
}
