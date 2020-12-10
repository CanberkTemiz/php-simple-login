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
          new ViewRenderer('login');
     }
}