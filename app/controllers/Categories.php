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

class Categories extends Controller
{
     public object $model;

     public function __construct()
     {
          parent::cekLogin();

          $this->model = new \App\Models\Category();
     }

     public function index()
     {
          $data['rows'] = $this->model->show();
          $this->dashboard('categories/index', $data);
     }

     public function input()
     {
          $this->dashboard('categories/input');
     }

     public function save()
     {
          $this->requirePost();
          $this->validateCsrf();

          $catName = trim((string) $this->postInput('cat_name'));
          if ($catName === '') {
               $this->flash('error', 'Nama kategori wajib diisi.');
               $this->redirect('/categories/input');
          }

          $this->model->save(['cat_name' => $catName]);
          $this->flash('success', 'Kategori berhasil ditambahkan.');
          $this->redirect('/categories');
     }

     public function edit($id)
     {
          $data['row'] = $this->model->edit($id);
          $this->dashboard('categories/edit', $data);
     }

     public function update()
     {
          $this->requirePost();
          $this->validateCsrf();

          $catName = trim((string) $this->postInput('cat_name'));
          if ($catName === '') {
               $this->flash('error', 'Nama kategori wajib diisi.');
               $this->redirect('/categories');
          }

          $this->model->update([
               'id' => (string) $this->postInput('id'),
               'cat_name' => $catName,
          ]);
          $this->flash('success', 'Kategori berhasil diperbarui.');
          $this->redirect('/categories');
     }

     public function delete($id)
     {
          $this->requirePost();
          $this->validateCsrf();

          $this->model->delete((string) $id);
          $this->flash('success', 'Kategori berhasil dihapus.');
          $this->redirect('/categories');
     }
}
