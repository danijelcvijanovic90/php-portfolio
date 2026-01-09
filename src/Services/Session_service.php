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

    public function destroy_session(): void
    {       
            session_unset();
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

    public function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public function is_admin(): bool
    {
        if(!$_SESSION['logedin_admin'])
        {
            session_destroy();
            header ("location: /orderly/public/login.php");
            exit;
        }
        return true;
    }

    public function is_user(): bool
    {
        if(!$_SESSION['logedin_user'])
        {
            session_destroy();
            header ("location: /orderly/public/login.php");
            exit;
        }
        return true;
    }

    public function password_changed(): bool
    {
        
    }

}