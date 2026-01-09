<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use PROJECT\Controllers\User_controller;
use PROJECT\Services\Session_service;
use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_user();


require_once __DIR__ . "/../../views/user/password_update.php";

