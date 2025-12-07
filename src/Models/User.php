<?php

namespace PROJECT\Models;

class User extends Db
{
    public function user_exists(string $username): bool
    {
        $stmt = $this -> pdo -> prepare ("SELECT COUNT(*) FROM user WHERE username = :username"); 
        $stmt -> bindparam(":username",$username);
        $stmt -> execute();  // Executes a COUNT(*) query which returns the number of matching rows (0 or 1).

        $user = $stmt -> fetchColumn(); // fetchColumn() returns the count directly as an integer.

        return $user > 0 ;// The function returns true if the username exists, false otherwise.
    }

    public function add_user(string $name,string $surname,string $email,string $password,string $role,int $company_id,string $username): void
    {
        $stmt = $this -> pdo -> prepare ("INSERT INTO user (name,surname,email,password,role,company_id,username) VALUES(:name,:surname,:password,:email,:role,:company_id,:username))");
        $stmt -> bindparam (":name",$name);
        $stmt -> bindparam (":surname",$surname);
        $stmt -> bindparam (":email",$email);
        $stmt -> bindparam (":password",$password);
        $stmt -> bindparam (":role",$role);
        $stmt -> bindparam (":company_id",$company_id);
        $stmt -> bindparam (":username",$username);
        $stmt -> execute();

    }

    public function get_all_users() :array
    {
        $stmt = $this -> pdo -> prepare ("SELECT * FROM user");
        $stmt -> execute();

        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_user_by_id(string $username): int
    {
        $stmt = $this -> pdo -> prepare("SELECT id FROM user WHERE username = :username");
        $stmt -> bindparam(":username",$username);
        $stmt -> execute();

        $user = $stmt -> fetchColumn();

        return $user;
    }

} 