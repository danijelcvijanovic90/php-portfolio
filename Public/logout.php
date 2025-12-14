<?php

require_once __DIR__ . "/../vendor/autoload.php";
use PROJECT\Services\Session_service;

$session = new Session_service();

$session -> destroy_session();


header("location: /orderly/public/index.php");
exit;



