<?php
declare(strict_types=1);

namespace App\Actions;

use App\SessionManager;
use App\Redirect;
use App\ViewRenderer;


class IndexAction
{
     public function __invoke()
     {
          $user = SessionManager::get('user');
               
          new ViewRenderer('index', [
               'user' => $user
          ]);
     }
}