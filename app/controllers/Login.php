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

class Login extends Controller
{

     public object $model;

     public function __construct()
     {

          $this->model = new \App\Models\Login();
     }

     public function index()
     {
          if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
               $this->redirect('/dashboard');
          }

          $this->login('login/index');
     }

     public function register()
     {
          if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
               $this->redirect('/dashboard');
          }

          $this->login('login/register');
     }

     public function proses()
     {
          $this->requirePost();
          $this->validateCsrf();

          $email = trim((string) $this->postInput('email'));
          $password = (string) $this->postInput('password');
          $row = $this->model->proses($email, $password);

          if (!empty($row)) {
               session_regenerate_id(true);
               $_SESSION['login'] = true;
               $_SESSION['user_id'] = $row['user_id'];
               $_SESSION['user_email'] = $row['user_email'];
               $_SESSION['user_full_name'] = $row['user_full_name'];
               $_SESSION['user_role'] = $row['user_role'] ?? 'operator';
               $this->redirect('/dashboard');
          } else {
               $this->flash('error', 'Email atau password tidak sesuai.');
               $this->redirect('/');
          }
     }

     public function store()
     {
          $this->requirePost();
          $this->validateCsrf();

          $data = [
               'email' => trim((string) $this->postInput('email')),
               'password' => (string) $this->postInput('password'),
               'full_name' => trim((string) $this->postInput('full_name')),
               'role' => 'operator',
          ];

          if ($data['email'] === '' || $data['password'] === '' || $data['full_name'] === '') {
               $this->flash('error', 'Semua field wajib diisi.');
               $this->redirect('/login/register');
          }

          $user = new \App\Models\User();
          if ($user->emailExists($data['email'])) {
               $this->flash('error', 'Email sudah terdaftar.');
               $this->redirect('/login/register');
          }

          $user->save($data);
          $this->flash('success', 'Registrasi berhasil. Silakan login sebagai operator.');
          $this->redirect('/');
     }
}
