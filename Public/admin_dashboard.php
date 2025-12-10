<?php

require_once __DIR__ . "/../vendor/autoload.php";

use PROJECT\Services\Session_service;

$session = new Session_service;

if(isset($_SESSION['logedin_admin']))
{
    include "../Views/Admin/Admin_dashboard.php";
}
else
{
    die ("You dont have premission to view this page!");
}
