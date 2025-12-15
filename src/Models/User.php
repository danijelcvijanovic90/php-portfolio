<?php


namespace PROJECT\Models;
use PDO;



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

    public function add_user(string $name,string $surname,?string $email,string $password,string $role,int $company_id,string $username): void //email can be string or null
    {
        $stmt = $this -> pdo -> prepare ("INSERT INTO user (name,surname,email,password,role,company_id,username) VALUES(:name,:surname,:email,:password,:role,:company_id,:username)");
        $stmt -> bindparam (":name",$name);
        $stmt -> bindparam (":surname",$surname);
        $stmt -> bindparam (":email",$email);
        $stmt -> bindparam (":password",$password);
        $stmt -> bindparam (":role",$role);
        $stmt -> bindparam (":company_id",$company_id);
        $stmt -> bindparam (":username",$username);
        $stmt -> execute();

    }

    public function get_user_by_username(string $username): ?array
    {
        $stmt = $this -> pdo -> prepare ("SELECT * FROM user WHERE username = :username");
        $stmt -> bindparam(":username",$username);
        $stmt -> execute();

        $data = $stmt -> fetch(PDO::FETCH_ASSOC);
        return $data ?: null; //if there is no user in $username return ?: null (false)  
    }

    public function get_all_users() :array
    {
        $stmt = $this -> pdo -> prepare ("SELECT * FROM user");
        $stmt -> execute();

        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_user_by_id(int $id): ?array
    {
        $stmt = $this -> pdo -> prepare("SELECT * FROM user WHERE id = :id");
        $stmt -> bindparam(":id",$id);
        $stmt -> execute();

        $user = $stmt -> fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    public function get_user_by_company (int $company_id) :array
    {
        $stmt = $this->pdo-> prepare 
        ("SELECT u.*, c.name AS company_name 
        FROM user u
        LEFT JOIN company c ON u.company_id = c.id
        WHERE u.company_id = :company_id");

        $stmt -> bindparam (":company_id",$company_id);
        $stmt -> execute();

        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

} 