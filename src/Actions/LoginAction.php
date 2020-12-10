<?php

declare(strict_types=1);

namespace App\Actions;

use App\ViewRenderer;
use App\SessionManager;
;

class LoginAction
{
     public function __invoke()
     {
          session_start();
          if ( SessionManager::has('user')) 
          {
               $user = SessionManager::get('user');
          
               new ViewRenderer('home', [
                    'user' => $user
               ]);
          }

          new ViewRenderer('login');
     }
}