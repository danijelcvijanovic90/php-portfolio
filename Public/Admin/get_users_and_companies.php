<?php


require_once __DIR__ . "/../../vendor/autoload.php";

use PROJECT\Controllers\User_controller;
use Dotenv\Dotenv;
use PROJECT\Services\Session_service;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$user_controller = new User_controller();
$companies = $user_controller->all_companies();

$users=$user_controller->show_user();


$session=new Session_service();


require_once __DIR__ . "/../../Views/Admin/User/User_settings.php";

