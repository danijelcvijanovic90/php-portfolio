<?php

namespace PROJECT\Models;
use PDO;

class Form_message extends Db
{
    public $name;
    public $email;
    public $phone_number;
    public $message;



    public function new_message(string $name, string $email, string $phone_number,string $message,string $subject): bool
    {
        $stmt=$this->pdo->prepare ("INSERT INTO msg_form (name,email,phone,message,subject) VALUES(:name,:email,:phone_number,:message,:subject)");
        $stmt->bindparam(":name",$name);
        $stmt->bindparam(":email",$email);
        $stmt->bindparam(":phone_number",$phone_number);
        $stmt->bindparam(":message",$message);
        $stmt->bindparam(":subject",$subject);
        
        return $stmt->execute();

    }

    public function all_messages():array
    {
        $stmt=$this->pdo->prepare("SELECT * FROM msg_form ORDER by date DESC");
        $stmt->execute();

        return $msg=$stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_message_by_id(int $id): array
    {
        $stmt=$this->pdo->prepare("SELECT * FROM msg_form WHERE id=:id");
        $stmt->bindparam(":id",$id);
        $stmt->execute();

        return $msg=$stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_message_by_id(int $id): bool
    {
        $stmt=$this->pdo->prepare("DELETE FROM msg_form WHERE id=:id");
        $stmt->bindparam(":id",$id);
        $stmt->execute();

        return $stmt->rowCount()>0;
    }

}