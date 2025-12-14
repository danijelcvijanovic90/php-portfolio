<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use PROJECT\Controllers\User_controller;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();


if(isset($_POST['add_user']))
{
    $user = new User_controller();
    $user->new_user($_POST);
}



