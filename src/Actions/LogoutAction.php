<?php

declare(strict_types=1);

namespace App\Actions;

use App\SessionManager;

class LogoutAction
{
     public function __invoke()
     {
          SessionManager::delete('user');

          $protocol = $_SERVER['SERVER_PROTOCOL'] === 'HTTP/1.1' 
          ? 'http' 
          : 'https';

          header("Location: {$protocol}://{$_SERVER['HTTP_HOST']}/?action=login");
     }
}