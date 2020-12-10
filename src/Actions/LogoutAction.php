<?php

declare(strict_types=1);

namespace App\Actions;

use App\Redirect;
use App\SessionManager;

class LogoutAction
{
    public function __invoke()
    {
        SessionManager::delete('user');
        Redirect::to('login');
    }
}
