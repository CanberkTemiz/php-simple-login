<?php

declare(strict_types=1);

namespace App;

class SessionManager
{
    public static function get(string $sessionKey)
    {
        return $_SESSION[$sessionKey] ?? null;
    }

    public static function set(string $sessionKey, $value)
    {
        $_SESSION[$sessionKey] = $value;
    }

    public static function has(string $sessionKey)
    {
        return isset($_SESSION[$sessionKey]);
    }

    public static function delete(string $sessionKey)
    {
        unset($_SESSION[$sessionKey]);
        session_destroy();
    }
}
