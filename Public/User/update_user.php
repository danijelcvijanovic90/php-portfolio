<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use Dotenv\Dotenv;
use PROJECT\Controllers\User_controller;
use PROJECT\Services\Session_service;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_user();

$update_user=new User_controller();
$update_user->edit_user($_POST);

if($update_user)
{
    $session->set_session("success","Successfuly updated!"); 
    header("location: user_dashboard.php");
    exit;
}
else
{
    $session->set_session("Error", "Error, please try again!");
    header("location: user_settings.php");
    exit;
}
