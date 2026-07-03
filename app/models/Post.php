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
use MongoDB\BSON\ObjectId;

class Post extends Model
{
     public function show(): array
     {
          $rows = $this->db->tb_posts->find([], ['sort' => ['_id' => -1]]);

          return array_map([$this, 'toArray'], iterator_to_array($rows));
     }

     public function optCat(): array
     {
          $rows = $this->db->tb_categories->find([], ['sort' => ['cat_name' => 1]]);

          return array_map(function ($row) {
               $row = (array) $row;

               return [
                    'cat_id' => (string) $row['_id'],
                    'cat_name' => $row['cat_name'] ?? '',
               ];
          }, iterator_to_array($rows));
     }

     public function save(array $data): void
     {
          $catId = new ObjectId($data['post_id_cat']);
          $category = $this->db->tb_categories->findOne(['_id' => $catId]);

          $this->db->tb_posts->insertOne([
               'post_title' => $data['post_title'],
               'post_text' => $data['post_text'],
               'post_categories' => [
                    'cat_id' => $catId,
                    'cat_name' => $category['cat_name'] ?? '',
               ],
          ]);
     }

     public function edit(string $id): ?array
     {
          $row = $this->db->tb_posts->findOne(['_id' => new ObjectId($id)]);

          return $row ? $this->toArray($row) : null;
     }

     public function update(array $data): void
     {
          $catId = new ObjectId($data['post_id_cat']);
          $category = $this->db->tb_categories->findOne(['_id' => $catId]);

          $this->db->tb_posts->updateOne(
               ['_id' => new ObjectId($data['id'])],
               [
                    '$set' => [
                         'post_title' => $data['post_title'],
                         'post_text' => $data['post_text'],
                         'post_categories' => [
                              'cat_id' => $catId,
                              'cat_name' => $category['cat_name'] ?? '',
                         ],
                    ],
               ]
          );
     }

     public function delete(string $id): void
     {
          $this->db->tb_posts->deleteOne(['_id' => new ObjectId($id)]);
     }

     private function toArray(object|array $row): array
     {
          $row = (array) $row;
          $category = isset($row['post_categories']) ? (array) $row['post_categories'] : [];

          return [
               'post_id' => (string) $row['_id'],
               'post_id_cat' => isset($category['cat_id']) ? (string) $category['cat_id'] : '',
               'post_title' => $row['post_title'] ?? '',
               'post_text' => $row['post_text'] ?? '',
               'cat_name' => $category['cat_name'] ?? '',
          ];
     }
}
