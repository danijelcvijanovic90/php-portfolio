<?php
require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Services\Session_service;

$session=new Session_service();
$check=$session->is_admin();

require_once __DIR__ . "/../../views/admin/menu/menu.php";