<?php

namespace PROJECT\Models;
use PROJECT\Models\Db;
use PDO;

class Menu extends Db
{
    public function get_day(string $day): array
    {
        $stmt=$this->pdo->prepare("SELECT * FROM menu WHERE day=:day");
        $stmt->bindparam(":day",$day);
        $stmt->execute();
        
        return $result=$stmt->fetch();
    }

    public function get_all_days(): array
    {
        $stmt=$this->pdo->prepare("SELECT * FROM menu");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add_product(int $menu_id, int $meal_id): bool
    {
        $stmt=$this->pdo->prepare("SELECT COUNT(*) FROM menu_meal WHERE menu_id=:menu_id AND meal_id=:meal_id");
        $stmt->bindparam(":menu_id",$menu_id);
        $stmt->bindparam(":meal_id",$meal_id);
        $stmt->execute();

        $result=$stmt->fetchColumn();

        if($result>0)
        {
            return false;
        }

        $stmt=$this->pdo->prepare("INSERT INTO menu_meal (menu_id,meal_id) VALUES (:menu_id,:meal_id)");
        $stmt->bindparam(":menu_id",$menu_id);
        $stmt->bindparam(":meal_id",$meal_id);
        $stmt->execute();

        return $stmt->rowCount()>0;
    }

    public function menu_day(string $day): array
    {
        $stmt=$this->pdo->prepare("SELECT menu_meal.meal_id,menu.day,menu_meal.menu_id,meals.name as meal_name,meals.category_id
        FROM menu 
        INNER JOIN menu_meal  ON menu.id = menu_meal.menu_id
        INNER JOIN meals  ON menu_meal.meal_id=meals.id
        WHERE menu.day=:day");
        $stmt->bindparam(":day",$day);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function delete_from_menu_meal_by_meal_id_and_menu_id(int $meal_id,int $menu_id): bool
    {
        $stmt=$this->pdo->prepare("DELETE FROM menu_meal WHERE meal_id=:meal_id AND menu_id=:menu_id");
        $stmt->bindparam(":meal_id",$meal_id);
        $stmt->bindparam(":menu_id",$menu_id);
        $stmt->execute();

        return $stmt->rowCount()>0;
    }



}