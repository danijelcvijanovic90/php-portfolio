<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use PROJECT\Services\Session_service;


$session = new Session_service();


if($session->is_admin())
{
    require_once __DIR__ . "/../../Views/Admin/Admin_dashboard.php";
}
else
{
    die ("You dont have premission to view this page!");
}
