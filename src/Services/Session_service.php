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
        if(session_status() === PHP_SESSION_NONE)
        {
            session_destroy();
        }
    }
}