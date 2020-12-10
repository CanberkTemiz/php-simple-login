<?php

declare(strict_types=1);

namespace App;

class AuthMiddleware
{
    public function __invoke()
    {
        if (!SessionManager::has('user')) {
            return Redirect::to('login');
        }
    }
}
