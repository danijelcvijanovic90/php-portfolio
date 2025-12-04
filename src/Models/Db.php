<?php

namespace PROJECT\Models;

class Db
{
    protected $pdo;

    public function __construct()
    {
        $this -> pdo = new \PDO ("mysql:host=". $_ENV['DB_HOST'] . ";dbname=".$_ENV['DB_NAME'],$_ENV['DB_ROOT'],$_ENV['DB_PASSWORD']);
    }
}