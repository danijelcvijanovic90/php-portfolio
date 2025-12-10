<?php

namespace PROJECT\Services;

class Session_service
{
    public function __construct()
    {
        if(session_status() === PHP_SESSION_NONE)
        {
            session_start();
        }
    }

    public function destroy_session()
    {
            session_destroy();
    }

    public function get_from_session(string $key): mixed
    {
        return $_SESSION[$key];
    }

    public function set_session(string $key,mixed $value): void
    {
        $_SESSION[$key] = $value;
    }
}