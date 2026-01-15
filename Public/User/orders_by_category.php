<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use PROJECT\Controllers\Order_controller;
use PROJECT\Services\Session_service;
use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$session->is_user();

$user_id=(int)$_SESSION['user_id'];
$category_id=(int)$_GET['category_id'];

$order_controller = new Order_controller();

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{

    $menu_id=(int)$_POST['menu_id'];
    $meal_id=(int)$_POST['meal_id'];

    if ($menu_id > 0 && $meal_id > 0) 
    {

        $week_start=$order_controller->get_week_start();
        $current_week=$order_controller->get_current_week($user_id);

        $added=$order_controller->add_meal_to_user_order($user_id,$week_start,$menu_id,$meal_id);

        if ($added) 
        {
            $session->set_session('success', 'Meal added!');
        } 
        else 
        {
            $session->set_session('error','Meal already exists for that day, remove it first!');
        }

        header("Location: " . $_SERVER['HTTP_REFERER']); //Redirect user back to the previous page
        exit;
    }
}


$user_order=$order_controller->user_menu($category_id);

$grouped_order=[];
foreach($user_order as $row) 
{
    $day=$row['day'];
    $grouped_order[$day][]=$row;
}

$week_start=$order_controller->get_week_start();
$current_week=$order_controller->get_current_week($user_id);
$my_orders=$order_controller->user_orders($user_id,$week_start,$current_week);




require_once __DIR__ . "/../../views/user/orders_by_category.php";
