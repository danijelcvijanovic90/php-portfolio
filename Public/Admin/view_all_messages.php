<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\Form_message_controller;

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();


$get_msg = new Form_message_controller();

$messages = $get_msg->see_messages();



require_once __DIR__ . "/../../Views/Admin/Messages/View_all_messages.php";



