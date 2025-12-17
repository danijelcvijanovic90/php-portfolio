<?php

require_once __DIR__ . "/../vendor/autoload.php";

use PROJECT\Controllers\Form_message_controller;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->load();


$controller = new Form_message_controller();
$controller->message($_POST);

if($controller)
{
    header("Location: contact.php?success=1");
    exit;
}
else
{
    echo "Form not valid";
}



