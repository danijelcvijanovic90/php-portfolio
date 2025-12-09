<?php

namespace PROJECT\Models;


class Company extends Db
{
    public function add_comapny(string $name,string $adress,string $notes): void
    {
        $stmt = $this -> pdo -> prepare("INSERT INTO company (name,adress,notes) VALUES (:name,:adress,:notes)");
        $stmt -> bindparam (":name",$name);
        $stmt -> bindparam (":adress",$adress);
        $stmt -> bindparam(":notes",$notes);
        $stmt -> execute();
    }

    public function get_company_by_name(string $name): ?array
    {
        $stmt = $this -> pdo -> prepare ("SELECT * FROM company WHERE name = :name");
        $stmt -> bindparam (":name",$name);
        $stmt -> execute();

        return $stmt -> fetch(PDO::FETCH_ASSOC) ?: null;
    }


    public function get_company_by_id(int $id): ?int
    {
        $stmt = $this -> pdo -> prepare ("SELECT id FROM company WHERE id = :id");
        $stmt -> bindparam (":id",$id);
        $stmt -> execute();

        return $stmt -> fetchColumn() ?: null;
    }

    public function get_all_companys(): array
    {
        $stmt = $this -> pdo -> prepare ("SELECT * FROM company");
        $stmt -> execute();

        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_comapny (string $name): bool
    {
        $stmt = $this -> pdo -> prepare("DELETE FROM company WHERE name = :name");
        $stmt -> bindparam(":name",$name);
        $stmt -> execute();

        return $stmt -> rowCount() > 0; // if something is deleted from DB return true
    }
}