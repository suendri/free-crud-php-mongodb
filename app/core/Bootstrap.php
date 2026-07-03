<?php

/**
 * https://github.com/suendri
 * --
 * e-mail : suendri@gmail.com
 * WA     : 62852-6361-6901
 * --
 */

namespace App\Core;

class Bootstrap
{
	public function __construct()
	{
		// Jika url diakses
		if (isset($_GET['page'])) {

			// filter_var = Filter Url
			$url = filter_var($_GET['page'], FILTER_SANITIZE_URL);

			// trim = Hilangkan space
			$url = trim(str_replace(' ', '', $url), '/');

			// explode = Membagi string diantara slash
			$url = $url === '' ? [] : explode('/', $url);

			// ucfirst = Uppercase First
			// array_shift = menampilkan nilai pertama array
			$page = ucfirst(array_shift($url) ?: 'Index');

			if (file_exists(ROOT . "app/controllers/" . $page . ".php")) {
				$class = "App\\Controllers\\" . $page;
				$controller = new $class;

				// cek method
				$action = array_shift($url) ?: "index";

				if (preg_match('/^[a-zA-Z][a-zA-Z0-9_]*$/', $action) && method_exists($controller, $action)) {
					// Parameters = controller/detail/1
					$params = array_values($url);
					if (!empty($params)) {
						call_user_func_array(array($controller, $action), $params);
					} else {
						$controller->{$action}();
					}
				} else {
					$controller->index();
				}
			} else {
				$class = "App\\Core\\Error";
				$controller = new $class();
				$controller->fileNotFound();
			}
		} else {
			$class = "App\\Controllers\\Index";
			$controller = new $class();
			$controller->index();
		}
	}
}
