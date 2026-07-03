<?php

/**
 * https://github.com/suendri
 * --
 * e-mail : suendri@gmail.com
 * WA     : 62852-6361-6901
 * --
 */

namespace App;

class Config
{
     public function __construct()
     {

          // Mulai sesi
          if (session_id() == "") {
               session_start();
          }

          // Timezone
          date_default_timezone_set("Asia/Jakarta");

          // Url dan Assets
          $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
          $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
          $basePath = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
          define("URL", $scheme . "://" . $host . ($basePath === '' ? '' : $basePath));
          define("AST", URL . "/layouts/assets");

          define("ROOT", dirname(__DIR__) . DIRECTORY_SEPARATOR);
     }

     public static function session($key)
     {

          if (isset($_SESSION[$key])) {
               return $_SESSION[$key];
          }

          return null;
     }
}
