<?php

namespace PROJECT\Models;

class Form_message extends Db
{
    public $name;
    public $email;
    public $phone_number;
    public $message;



    public function new_message(string $name, string $email, int $phone_number,string $message): void
    {
        $stmt = $this -> pdo -> prepare ("INSERT INTO msg_form (name,email,phone,message) VALUES(:name,:email,:phone_number,:message)");
        $stmt -> bindparam(":name",$name);
        $stmt -> bindparam(":email",$email);
        $stmt -> bindparam(":phone_number",$phone_number);
        $stmt -> bindparam(":message",$message);
        $stmt -> execute();

    }

}