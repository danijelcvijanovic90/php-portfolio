<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\User_controller;

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();


$user = new User_controller();

$user_company = $user->user_by_company($_GET['company_id']);

require_once __DIR__ . "/../../Views/Admin/User/Show_users.php";