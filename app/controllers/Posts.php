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

class Posts extends Controller
{
     public object $model;

     public function __construct()
     {
          parent::cekLogin();

          $this->model = new \App\Models\Post();
     }

     public function index()
     {
          $data['rows'] = $this->model->show();
          $this->dashboard('posts/index', $data);
     }

     public function input()
     {
          // Membuat option categories
          $data['optcat'] = $this->model->optCat();

          $this->dashboard('posts/input', $data);
     }

     public function save()
     {
          $this->requirePost();
          $this->validateCsrf();

          $data = $this->postData();
          if ($data['post_title'] === '' || $data['post_id_cat'] === '') {
               $this->flash('error', 'Kategori dan judul wajib diisi.');
               $this->redirect('/posts/input');
          }

          $this->model->save($data);
          $this->flash('success', 'Post berhasil ditambahkan.');
          $this->redirect('/posts');
     }

     public function edit($id)
     {
          // Menampilkan data edit
          $data['row'] = $this->model->edit($id);

          // Membuat option categories
          $data['optcat'] = $this->model->optCat();

          $this->dashboard('posts/edit', $data);
     }

     public function update()
     {
          $this->requirePost();
          $this->validateCsrf();

          $data = $this->postData();
          $data['id'] = (string) $this->postInput('id');

          if ($data['post_title'] === '' || $data['post_id_cat'] === '') {
               $this->flash('error', 'Kategori dan judul wajib diisi.');
               $this->redirect('/posts');
          }

          $this->model->update($data);
          $this->flash('success', 'Post berhasil diperbarui.');
          $this->redirect('/posts');
     }

     public function delete($id)
     {
          $this->requirePost();
          $this->validateCsrf();

          $this->model->delete((string) $id);
          $this->flash('success', 'Post berhasil dihapus.');
          $this->redirect('/posts');
     }

     private function postData(): array
     {
          return [
               'post_id_cat' => (string) $this->postInput('post_id_cat'),
               'post_title' => trim((string) $this->postInput('post_title')),
               'post_text' => trim((string) $this->postInput('post_text')),
          ];
     }
}
