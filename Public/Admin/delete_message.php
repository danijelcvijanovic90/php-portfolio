<?php

require_once __DIR__ . "/../../vendor/autoload.php";
use PROJECT\Controllers\Form_message_controller;
use Dotenv\Dotenv;

$dotenv=Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$msg=new Form_message_controller();
$id=(int)$_GET['id'];
$result=$msg->delete_message($id);

if($result)
{
    header("location: view_all_messages.php");
    exit;
}
else
{
    echo "ID does not exists";
}


