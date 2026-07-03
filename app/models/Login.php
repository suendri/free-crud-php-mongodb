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
     public function findByEmail(string $email): ?array
     {
          $user = new User();

          return $user->findByEmail($email);
     }

     public function proses(string $email, string $password): ?array
     {
          $row = $this->findByEmail($email);

          if ($row && password_verify($password, $row['user_password'])) {
               return $row;
          }

          return null;
     }
}
