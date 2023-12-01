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

class Login extends Model
{
     public function proses()
     {
          $email = $_POST['email'];
          $password = $_POST['password'];

          $collection = $this->db->tb_users;
          $row = $collection->findOne(['user_email' => $email]);

          if (!empty($row) and password_verify($password, $row['user_password'])) {
               return $row;
          }
     }
}
