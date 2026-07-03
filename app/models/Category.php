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

class Category extends Model
{
     public function show(): array
     {
          $rows = $this->db->tb_categories->find([], ['sort' => ['_id' => -1]]);

          return array_map([$this, 'toArray'], iterator_to_array($rows));
     }

     public function save(array $data): void
     {
          $this->db->tb_categories->insertOne([
               'cat_name' => $data['cat_name'],
          ]);
     }

     public function edit(string $id): ?array
     {
          $row = $this->db->tb_categories->findOne(['_id' => new ObjectId($id)]);

          return $row ? $this->toArray($row) : null;
     }

     public function update(array $data): void
     {
          $objectId = new ObjectId($data['id']);

          $this->db->tb_categories->updateOne(
               ['_id' => $objectId],
               ['$set' => ['cat_name' => $data['cat_name']]]
          );

          $this->db->tb_posts->updateMany(
               ['post_categories.cat_id' => $objectId],
               ['$set' => ['post_categories.cat_name' => $data['cat_name']]]
          );
     }

     public function delete(string $id): void
     {
          $this->db->tb_categories->deleteOne(['_id' => new ObjectId($id)]);
     }

     private function toArray(object|array $row): array
     {
          $row = (array) $row;

          return [
               'cat_id' => (string) $row['_id'],
               'cat_name' => $row['cat_name'] ?? '',
          ];
     }
}
