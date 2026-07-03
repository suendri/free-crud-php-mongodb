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

class User extends Model
{
      public function show(): array
      {
            $rows = $this->db->tb_users->find([], ['sort' => ['_id' => -1]]);

            return array_map([$this, 'toArray'], iterator_to_array($rows));
      }

      public function save(array $data): void
      {
            $this->db->tb_users->insertOne([
                  'user_email' => $data['email'],
                  'user_password' => password_hash($data['password'], PASSWORD_DEFAULT),
                  'user_full_name' => $data['full_name'],
                  'user_role' => $data['role'] ?? 'operator',
                  'created_at' => date('Y-m-d H:i:s'),
            ]);
      }

      public function edit(string $id): ?array
      {
            $row = $this->db->tb_users->findOne(['_id' => new ObjectId($id)]);

            return $row ? $this->toArray($row, true) : null;
      }

      public function update(array $data): void
      {
            $set = [
                  'user_email' => $data['email'],
                  'user_full_name' => $data['full_name'],
            ];

            if (!empty($data['password'])) {
                  $set['user_password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            }

            $this->db->tb_users->updateOne(
                  ['_id' => new ObjectId($data['id'])],
                  ['$set' => $set]
            );
      }

      public function updateRole(string $id, string $role): void
      {
            if (!in_array($role, ['admin', 'operator'], true)) {
                  return;
            }

            $this->db->tb_users->updateOne(
                  ['_id' => new ObjectId($id)],
                  ['$set' => ['user_role' => $role]]
            );
      }

      public function delete(string $id): void
      {
            $this->db->tb_users->deleteOne(['_id' => new ObjectId($id)]);
      }

      public function emailExists(string $email, ?string $ignoreId = null): bool
      {
            $filter = ['user_email' => $email];

            if ($ignoreId !== null && $ignoreId !== '') {
                  $filter['_id'] = ['$ne' => new ObjectId($ignoreId)];
            }

            return $this->db->tb_users->countDocuments($filter, ['limit' => 1]) > 0;
      }

      public function findByEmail(string $email): ?array
      {
            $row = $this->db->tb_users->findOne(['user_email' => $email]);

            return $row ? $this->toArray($row, true) : null;
      }

      private function toArray(object|array $row, bool $includePassword = false): array
      {
            $row = (array) $row;
            $data = [
                  'user_id' => (string) $row['_id'],
                  'user_email' => $row['user_email'] ?? '',
                  'user_full_name' => $row['user_full_name'] ?? '',
                  'user_role' => $row['user_role'] ?? 'operator',
                  'created_at' => $row['created_at'] ?? '',
            ];

            if ($includePassword) {
                  $data['user_password'] = $row['user_password'] ?? '';
            }

            return $data;
      }
}
