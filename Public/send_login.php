<?php

require_once __DIR__ . ("/../vendor/autoload.php");


use PROJECT\Controllers\User_controller;

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->load();

$send_data = new User_controller;

if(isset($_POST['login']))
{
    $send_data -> login($_POST);
}

else
{
    die("Invalid request!");
}
