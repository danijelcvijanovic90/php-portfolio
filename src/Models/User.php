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

    public function add_user(string $name,string $surname,?string $email,string $password,string $role,int $company_id,string $username): bool
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

        return $stmt->rowCount()>0;
    }

    public function update_user_with_password(int $id,string $name, string $surname, ?string $email, string $password, string $role, string $username,int $password_update): void
    {
        $stmt=$this->pdo->prepare("UPDATE user SET name=:name,surname=:surname,email=:email,password=:password,role=:role,username=:username,password_update=:password_update WHERE id=:id");
        $stmt->bindparam(":id",$id);
        $stmt->bindparam(":name",$name);
        $stmt->bindparam(":surname",$surname);
        $stmt->bindparam(":email",$email);
        $stmt->bindparam(":password",$password);
        $stmt->bindparam(":role",$role);
        $stmt->bindparam(":username",$username);
        $stmt->bindparam(":password_update",$password_update);
        $stmt->execute();
    }

        public function update_user_without_password(int $id,string $name, string $surname, ?string $email, string $role, string $username, int $password_update): void
    {
        $stmt=$this->pdo->prepare("UPDATE user SET name=:name,surname=:surname,email=:email,role=:role,username=:username,password_update=:password_update WHERE id=:id");
        $stmt->bindparam(":id",$id);
        $stmt->bindparam(":name",$name);
        $stmt->bindparam(":surname",$surname);
        $stmt->bindparam(":email",$email);
        $stmt->bindparam(":role",$role);
        $stmt->bindparam(":username",$username);
        $stmt->bindparam(":password_update",$password_update);
        $stmt->execute();
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

    public function get_user_by_id(int $id): array
    {
        $stmt=$this->pdo->prepare("SELECT * FROM user WHERE id = :id");
        $stmt->bindparam(":id",$id);
        $stmt->execute();

        return $user=$stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function get_user_by_company (int $company_id) :array
    {
        $stmt=$this->pdo-> prepare 
        ("SELECT u.*, c.name AS company_name 
        FROM user u
        LEFT JOIN company c ON u.company_id = c.id
        WHERE u.company_id = :company_id");

        $stmt -> bindparam (":company_id",$company_id);
        $stmt -> execute();

        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_all_users_and_companies(): array
    {
        $stmt=$this->pdo->prepare("SELECT u.id,u.name,u.surname,u.username,u.email,u.role, c.name AS company_name
        FROM user u
        LEFT JOIN company c ON u.company_id=c.id
        ORDER by c.name ASC");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function delete_user_by_id(int $id): bool
    {
        $stmt=$this->pdo->prepare("DELETE FROM user WHERE id=:id");
        $stmt->bindparam(":id",$id);
        $stmt->execute();

        return $result=$stmt->rowCount()>0;
    }

    public function password_not_changed_check_by_user_id(int $id): bool
    {
        $stmt=$this->pdo->prepare("SELECT * FROM user WHERE id=:id AND password_update=0");
        $stmt->bindparam(":id",$id);
        $stmt->execute();

        return $stmt->rowCount() == 0;
    }

    public function update_password_with_user_id(int $id, $password): bool
    {
        $stmt=$this->pdo->prepare("UPDATE user SET password=:password,password_update=1 WHERE id=:id");
        $stmt->bindparam(":password",$password);
        $stmt->bindparam(":id",$id);
        $stmt->execute();

        return $stmt->rowCount()>0;
    }
} 