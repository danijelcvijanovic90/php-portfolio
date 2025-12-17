<?php 

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\Form_message_controller;

use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$get_msg=new Form_message_controller();

$id=(int)$_GET['id'];

$messages=$get_msg->message_by_id($id);

if($messages)
{
    require_once __DIR__ . "/../../Views/Admin/Messages/View_message.php";
}

else
{
    echo "Not valid ID";
}


