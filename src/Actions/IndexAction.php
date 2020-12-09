<?php
declare(strict_types=1);

namespace App\Actions;

use App\SessionManager;
use App\ViewRenderer;

class IndexAction
{
     public function __invoke()
     {
          if (SessionManager::has('user')) {
               new ViewRenderer('index');
          }

          $protocol = $_SERVER['SERVER_PROTOCOL'] === 'HTTP/1.1' 
               ? 'http' 
               : 'https';

          header("Location: {$protocol}://{$_SERVER['HTTP_HOST']}/?action=login");
     }
}