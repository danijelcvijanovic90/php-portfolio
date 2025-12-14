<?php 

require_once __DIR__ . "/../../vendor/autoload.php";

use PROJECT\Controllers\Company_controller;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

$data = new Company_controller;

if(isset($_POST['add_company']))
{
    $data->new_company($_POST);
}
else
{
    echo "Invalid request!";
}
