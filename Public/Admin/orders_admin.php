<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\Category_controller;
use PROJECT\Controllers\Menu_controller;
use PROJECT\Controllers\Company_controller;
use Dotenv\Dotenv;
use PROJECT\Services\Session_service;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$session=new Session_service();
$check=$session->is_admin();

$category_controller=new Category_controller();
$categories=$category_controller->all_categories();

$menu_controller=new Menu_controller();
$days=$menu_controller->get_all_days();

$company_controller=new Company_controller();
$companies=$company_controller->view_companies();


require_once __DIR__ . "/../../views/admin/orders/orders_admin.php";