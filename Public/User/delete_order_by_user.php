<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use PROJECT\Controllers\Menu_controller;
use PROJECT\Services\Session_service;
use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$session->is_user();

$user_id=(int)$_SESSION['user_id'];
$order_id=(int)$_POST['order_id'];

$menu_controller = new Menu_controller();
$delete_order=$menu_controller->delete_order_by_user($user_id,$order_id);

 if (!$delete_order) 
    {
        $session->set_session('success_delete', 'Meal deleted!');
    } 
    else 
    {
        $session->set_session('error_delete','Meal not deleted!');
    }

header("Location: " . $_SERVER['HTTP_REFERER']); //Redirect user back to the previous page
exit;

