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
$category_id=(int)$_GET['category_id'];

$menu_controller = new Menu_controller();

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{

    $menu_id=(int)$_POST['menu_id'];
    $meal_id=(int)$_POST['meal_id'];

    if ($menu_id > 0 && $meal_id > 0) 
    {

        $week_start=$menu_controller->get_week_start();
        $current_week=$menu_controller->get_current_week($user_id);

        $added=$menu_controller->add_meal_to_user_menu($user_id,$week_start,$menu_id,$meal_id);

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


$user_menu=$menu_controller->user_menu($category_id);

$grouped_menu=[];
foreach($user_menu as $row) 
{
    $day=$row['day'];
    $grouped_menu[$day][]=$row;
}

$week_start=$menu_controller->get_week_start();
$current_week=$menu_controller->get_current_week($user_id);
$my_orders=$menu_controller->user_orders($user_id,$week_start,$current_week);




require_once __DIR__ . "/../../views/user/orders_by_category.php";
