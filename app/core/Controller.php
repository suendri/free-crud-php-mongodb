<?php

/**
 * https://github.com/suendri
 * --
 * e-mail : suendri@gmail.com
 * WA     : 62852-6361-6901
 * --
 */

namespace App\Core;

class Controller
{
	// Layout home
	public function login($view, $data = [])
	{
		require_once ROOT . "layouts/login.php";
	}

	// layout dashboard
	public function dashboard($view, $data = [])
	{
		require_once ROOT . "layouts/dashboard.php";
	}

	protected function redirect(string $path): void
	{
		header('location:' . url($path));
		exit();
	}

	protected function requirePost(): void
	{
		if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
			$this->redirect('/dashboard');
		}
	}

	protected function validateCsrf(): void
	{
		$token = $_POST['_csrf_token'] ?? '';
		if (!is_string($token) || !hash_equals($_SESSION['_csrf_token'] ?? '', $token)) {
			http_response_code(419);
			die('CSRF token tidak valid.');
		}
	}

	protected function postInput(string $key, mixed $default = ''): mixed
	{
		return $_POST[$key] ?? $default;
	}

	protected function flash(string $key, ?string $message = null): ?string
	{
		if ($message !== null) {
			$_SESSION['_flash'][$key] = $message;
			return null;
		}

		$value = $_SESSION['_flash'][$key] ?? null;
		unset($_SESSION['_flash'][$key]);

		return $value;
	}

	public static function cekLogin()
	{
		if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
			header('location:' . URL);
			exit();
		}
	}

	public static function cekAdmin()
	{
		self::cekLogin();

		if (($_SESSION['user_role'] ?? '') !== 'admin') {
			http_response_code(403);
			die('Akses hanya untuk admin.');
		}
	}

	public static function isAdmin(): bool
	{
		return ($_SESSION['user_role'] ?? '') === 'admin';
	}
}
