<?php

require_once __DIR__ . "/../vendor/autoload.php";

use PROJECT\Controllers\Form_message_controller;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->load();

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $controller = new Form_message_controller();
    $controller->message($_POST);
}


header("Location: contact.php?success=1");
exit;