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

class Users extends Controller
{
	public object $model;

	public function __construct()
	{
		parent::cekLogin();

		$this->model = new \App\Models\User();
	}

	public function index()
	{
		self::cekAdmin();
		$data['rows'] = $this->model->show();
		$this->dashboard('users/index', $data);
	}

	public function input()
	{
		self::cekAdmin();
		$this->dashboard('users/input');
	}

	public function save()
	{
		self::cekAdmin();
		$this->requirePost();
		$this->validateCsrf();

		$data = $this->userData();
		$data['role'] = in_array($this->postInput('role'), ['admin', 'operator'], true) ? $this->postInput('role') : 'operator';

		if ($data['email'] === '' || $data['password'] === '' || $data['full_name'] === '') {
			$this->flash('error', 'Semua field wajib diisi.');
			$this->redirect('/users/input');
		}

		if ($this->model->emailExists($data['email'])) {
			$this->flash('error', 'Email sudah digunakan.');
			$this->redirect('/users/input');
		}

		$this->model->save($data);
		$this->flash('success', 'User berhasil ditambahkan.');
		$this->redirect('/users');
	}

	public function edit($id)
	{
		self::cekAdmin();
		$data['row'] = $this->model->edit($id);
		$this->dashboard('users/edit', $data);
	}

	public function update()
	{
		self::cekAdmin();
		$this->requirePost();
		$this->validateCsrf();

		$data = $this->userData();
		$data['id'] = (string) $this->postInput('id');

		if ($data['email'] === '' || $data['full_name'] === '') {
			$this->flash('error', 'Email dan nama lengkap wajib diisi.');
			$this->redirect('/users');
		}

		if ($this->model->emailExists($data['email'], $data['id'])) {
			$this->flash('error', 'Email sudah digunakan.');
			$this->redirect('/users');
		}

		$this->model->update($data);
		$this->flash('success', 'User berhasil diperbarui.');
		$this->redirect('/users');
	}

	public function delete($id)
	{
		self::cekAdmin();
		$this->requirePost();
		$this->validateCsrf();

		if ((string) $id === (string) ($_SESSION['user_id'] ?? '')) {
			$this->flash('error', 'Akun yang sedang login tidak bisa dihapus.');
			$this->redirect('/users');
		}

		$this->model->delete((string) $id);
		$this->flash('success', 'User berhasil dihapus.');
		$this->redirect('/users');
	}

	public function role($id)
	{
		self::cekAdmin();
		$this->requirePost();
		$this->validateCsrf();

		if ((string) $id === (string) ($_SESSION['user_id'] ?? '')) {
			$this->flash('error', 'Role akun yang sedang login tidak bisa diubah sendiri.');
			$this->redirect('/users');
		}

		$role = (string) $this->postInput('role');
		$this->model->updateRole((string) $id, $role);
		$this->flash('success', 'Role user berhasil diperbarui.');
		$this->redirect('/users');
	}

	private function userData(): array
	{
		return [
			'email' => trim((string) $this->postInput('email')),
			'password' => (string) $this->postInput('password'),
			'full_name' => trim((string) $this->postInput('full_name')),
		];
	}
}
