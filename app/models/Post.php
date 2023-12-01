<?php

/**
 * https://github.com/suendri
 * --
 * e-mail : suendri@gmail.com
 * WA     : 62852-6361-6901
 * --
 */

namespace App\Models;

use App\Core\Model;
use MongoDB;

class Post extends Model
{

     public function show()
     {
          $collection = $this->db->tb_posts;
          $rows = $collection->find([]);

          return $rows;
     }

     public function optCat()
     {
          $collection = $this->db->tb_categories;
          $rows = $collection->find([]);

          return $rows;
     }

     public function save()
     {
          $post_id_cat = $_POST['post_id_cat'];
          $post_title = $_POST['post_title'];
          $post_text = $_POST['post_text'];

          $col_cat = $this->db->tb_categories;
          $row_cat = $col_cat->findOne(['_id' => new MongoDB\BSON\ObjectId($post_id_cat)]);

          $collection = $this->db->tb_posts;
          $collection->insertOne([
               'post_title' => $post_title,
               'post_text' => $post_text,
               'post_categories' => [
                    'cat_id' => new MongoDB\BSON\ObjectId($post_id_cat),
                    'cat_name' => $row_cat['cat_name']
               ]
          ]);
     }

     public function edit($id)
     {
          $collection = $this->db->tb_posts;
          $row = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

          return $row;
     }

     public function update()
     {
          $post_id_cat = $_POST['post_id_cat'];
          $post_title = $_POST['post_title'];
          $post_text = $_POST['post_text'];
          $id = $_POST['id'];

          $col_cat = $this->db->tb_categories;
          $row_cat = $col_cat->findOne(['_id' => new MongoDB\BSON\ObjectId($post_id_cat)]);

          $collection = $this->db->tb_posts;
          $collection->updateOne(
               ['_id' => new MongoDB\BSON\ObjectId($id)],
               [
                    '$set' => [
                         'post_title' => $post_title,
                         'post_text' => $post_text,
                         'post_categories.cat_id' => new MongoDB\BSON\ObjectId($post_id_cat),
                         'post_categories.cat_name' => $row_cat['cat_name']
                    ]
               ]
          );
     }

     public function delete($id)
     {

          $collection = $this->db->tb_posts;
          $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
     }
}
