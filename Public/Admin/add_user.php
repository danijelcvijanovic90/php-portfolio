<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use PROJECT\Controllers\User_controller;
use Dotenv\Dotenv;
use PROJECT\Services\Session_service;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_admin();

$user_controller = new User_controller();
$user=$user_controller->new_user($_POST);

if($user)
{
    $session->set_session('success','New user added!');
}
else
{
    $session->set_session('error','Error, user not added!');
}

header("location: get_users_and_companies.php");
exit;



