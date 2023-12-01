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

class Category extends Model
{

     public function show()
     {

          $collection = $this->db->tb_categories;
          $rows = $collection->find([]);

          return $rows;
     }

     public function save()
     {
          $cat_name = $_POST['cat_name'];

          $collection = $this->db->tb_categories;
          $collection->insertOne([
               'cat_name' => $cat_name
          ]);
     }

     public function edit($id)
     {
          $collection = $this->db->tb_categories;
          $row = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

          return $row;
     }

     public function update()
     {
          $cat_name = $_POST['cat_name'];
          $id = $_POST['id'];

          $collection1 = $this->db->tb_categories;
          $collection1->updateOne(
               ['_id' => new MongoDB\BSON\ObjectId($id)],
               ['$set' => [
                    'cat_name' => $cat_name
               ]]
          );

          $collection2 = $this->db->tb_posts;
          $collection2->updateMany(
               ['post_categories.cat_id' => new MongoDB\BSON\ObjectId($id)],
               [
                    '$set' => [
                         'post_categories.cat_id' => new MongoDB\BSON\ObjectId($id),
                         'post_categories.cat_name' => $cat_name
                    ]
               ]
          );
     }
}
