<?php

namespace PROJECT\Models;
use PDO;

class Company extends Db
{

    public function company_exists(string $name) :bool
    {
        $stmt=$this->pdo->prepare("SELECT id FROM company WHERE name = :name LIMIT 1");
        $stmt->bindparam(':name',$name);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function add_company(string $name,string $address,string $notes): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO company (name,address,notes) VALUES (:name,:address,:notes)");
        $stmt->bindparam (":name",$name);
        $stmt->bindparam (":address",$address);
        $stmt->bindparam(":notes",$notes);
        $stmt->execute();
    }

    public function get_company_by_name(string $name): ?array
    {
        $stmt = $this -> pdo -> prepare ("SELECT * FROM company WHERE name = :name");
        $stmt -> bindparam (":name",$name);
        $stmt -> execute();

        return $stmt -> fetch(PDO::FETCH_ASSOC) ?: null; //if name does not exists return null
    }


    public function get_company_by_id(int $id): ?int
    {
        $stmt = $this -> pdo -> prepare ("SELECT id FROM company WHERE id = :id");
        $stmt -> bindparam (":id",$id);
        $stmt -> execute();

        return $stmt -> fetchColumn() ?: null; //if id does not exists return null
    }

    public function get_all_companies(): array
    {
        $stmt = $this->pdo->prepare ("SELECT * FROM company");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_company (string $name): bool
    {
        $stmt = $this -> pdo -> prepare("DELETE FROM company WHERE name = :name");
        $stmt -> bindparam(":name",$name);
        $stmt -> execute();

        return $stmt -> rowCount() > 0; // if something is deleted from DB return true
    }
}