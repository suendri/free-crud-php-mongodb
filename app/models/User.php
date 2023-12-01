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

class User extends Model
{

      public function show()
      {
            $collection = $this->db->tb_users;
            $rows = $collection->find([]);

            return $rows;
      }

      public function save()
      {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $full_name = $_POST['full_name'];

            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $collection = $this->db->tb_users;
            $collection->insertOne([
                  'user_email' => $email,
                  'user_password' => $password_hash,
                  'user_full_name' => $full_name
            ]);
      }

      public function edit($id)
      {
            $collection = $this->db->tb_users;
            $row = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

            return $row;
      }

      public function update()
      {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $full_name = $_POST['full_name'];
            $id = $_POST['id'];

            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $collection = $this->db->tb_users;

            if (!empty($password)) {
                  $collection->updateOne(
                        ['_id' => new MongoDB\BSON\ObjectId($id)],
                        ['$set' => [
                              'user_email' => $email,
                              'user_password' => $password_hash,
                              'user_full_name' => $full_name
                        ]]
                  );
            } else {
                  $collection->updateOne(
                        ['_id' => new MongoDB\BSON\ObjectId($id)],
                        ['$set' => [
                              'user_email' => $email,
                              'user_full_name' => $full_name
                        ]]
                  );
            }
      }

      public function delete($id)
      {
            $collection = $this->db->tb_users;
            $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
      }
}
