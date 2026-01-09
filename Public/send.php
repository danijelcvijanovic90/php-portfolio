<?php

require_once __DIR__ . "/../vendor/autoload.php";

use PROJECT\Controllers\Form_message_controller;
use Dotenv\Dotenv;
use PROJECT\Services\Session_service;

$dotenv = Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->load();

$session=new Session_service();


$controller = new Form_message_controller();
$controller->message($_POST);

if($controller)
{
    $session->set_session('success',"Message sent!");
}
else
{
    $session->set_session('error','Message not sent!');
}

header("location: contact.php");
exit;



