<?php

declare(strict_types=1);

namespace App\Actions;

use App\SessionManager;
use App\Redirect;

class LogoutAction
{
     public function __invoke()
     {
          session_start();
          SessionManager::delete('user');
          Redirect::to('login');
     }
}