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
          session_start();

          if (SessionManager::has('user')) 
          {
               $user = SessionManager::get('user');
               
               new ViewRenderer('home', [
                    "user" => $user
               ]);
          }

          Redirect::to('login');
     }
}