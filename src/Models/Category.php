<?php

namespace PROJECT\Models;

class Category extends Db
{

    public function category_exists (string $category_name) :bool
    {
        $stmt =  $this -> pdo -> prepare("SELECT COUNT(*) FROM category WHERE name = :name");
        $stmt -> bindparam(':name',$category_name);
        $stmt -> execute();

        return $stmt -> fetchColumn() > 0;
    }

    public function add_category(string $category_name): void
    {
        $stmt = $this -> pdo -> prepare ("INSERT INTO category (name) VALUES (:name)");
        $stmt -> bindparam(':name',$category_name);
        $stmt -> execute();
    }

    public function get_category_by_id(int $id) :?int
    {
        $stmt = $this -> pdo -> prepare ("SELECT id FROM category WHERE id = :id");
        $stmt -> bindparam(':id',$id);
        $stmt -> execute();

        return $stmt -> fetchColumn() ?: null;        
    }

    public function delete_category(string $category_name) :bool
    {
        $stmt = $this -> pdo -> prepare ("DELETE FROM category WHERE name = :name");
        $stmt -> bindparam(':name', $category_name);
        $stmt -> execute();

        return $stmt -> rowCount() > 0;
    }
    
    public function update_category(string $category_name, int $id) :bool
    {
        $stmt = $this -> pdo -> prepare ("UPDATE category SET name = :name WHERE id = :id");
        $stmt -> bindparam(':name', $category_name);
        $stmt -> bindparam(':id',$id);
        $stmt -> execute();

        return $stmt -> rowCount() > 0;
    }

    public function get_all_categories() :array
    {
        $stmt = $this -> pdo -> prepare("SELECT * FROM category ORDER BY id DESC");
        
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
}