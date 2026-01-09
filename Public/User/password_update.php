<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use PROJECT\Controllers\User_controller;
use PROJECT\Services\Session_service;
use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_user();

$user_id=(int)$_SESSION['user_id'];


$user_controller=new User_controller();
$update=$user_controller->update_password_with_user_id($user_id,$_POST);

if(is_array($update))
{
    $_SESSION['error'] = implode('<br>', $update);
    header('Location: change_password.php');
    exit;
}

if($update === true) 
{
    $_SESSION['success'] = 'Password updated successfully!';
    header('Location: user_dashboard.php');
    exit;
}
if($update === false) 
{
    $_SESSION['error'] = 'Unexpected error occurred while updating password';
    header('Location: change_password.php');
    exit;
}


