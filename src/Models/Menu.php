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
        $stmt=$this->pdo->prepare("SELECT day FROM menu");
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

    public function user_menu($category_id): array
    {
        $stmt=$this->pdo->prepare("SELECT mm.id as menu_meal_id,mm.meal_id,mm.menu_id,m.day,ml.name meal_name,ml.category_id,ml.description,c.name as category_name
        FROM menu as m 
        INNER JOIN menu_meal as mm ON m.id=mm.menu_id
        INNER JOIN meals as ml ON mm.meal_id=ml.id
        INNER JOIN category as c ON c.id=ml.category_id
        WHERE c.id=:category_id
        ORDER BY FIELD(m.day, 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday')");
        $stmt->bindparam(":category_id",$category_id);
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

    public function get_week_start(): string
    {
        $stmt=$this->pdo->prepare("SELECT week_start FROM menu");
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function check_current_week(int $user_id,int $menu_id,int $current_week): bool
    {
        $stmt=$this->pdo->prepare("SELECT COUNT(*) FROM orders WHERE 
        user_id=:user_id
        AND menu_id=:menu_id
        AND current_week=:current_week");
        $stmt->bindparam(":user_id",$user_id);
        $stmt->bindparam(":menu_id",$menu_id);
        $stmt->bindparam(":current_week",$current_week);
        $stmt->execute();

        return $stmt->fetchColumn()>0;
    }

    public function add_meal_to_user_menu(int $user_id, int $menu_id, int $current_week, int $meal_id): bool
    {
        $stmt=$this->pdo->prepare("INSERT INTO orders (menu_id,user_id,current_week,meal_id) VALUES (:menu_id,:user_id,:current_week,:meal_id)");
        $stmt->bindparam(":menu_id",$menu_id);
        $stmt->bindparam(":user_id",$user_id);
        $stmt->bindparam(":current_week",$current_week);
        $stmt->bindparam(":meal_id",$meal_id);

        return $stmt->execute();
    }

    public function get_current_week(int $user_id): int
    {
        $stmt=$this->pdo->prepare("SELECT current_week FROM orders WHERE user_id=:user_id ORDER BY order_date DESC LIMIT 1");
        $stmt->bindparam(":user_id",$user_id);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function user_orders(int $user_id,int $current_week): array
    {
        $stmt=$this->pdo->prepare("SELECT o.id,m.day,ml.name,c.name as category_name 
        FROM orders as o
        INNER JOIN menu as m ON o.menu_id=m.id
        INNER JOIN meals as ml ON o.meal_id=ml.id
        INNER JOIN category as c ON ml.category_id=c.id
        WHERE user_id=:user_id
        AND current_week=:current_week
        ORDER BY menu_id
        ");
        $stmt->bindparam(":user_id",$user_id);
        $stmt->bindparam(":current_week",$current_week);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_order_by_user(int $user_id,int $order_id): bool
    {
        $stmt=$this->pdo->prepare("DELETE FROM orders WHERE user_id=:user_id AND id=:order_id");
        $stmt->bindparam(":user_id",$user_id);
        $stmt->bindparam(":order_id",$order_id);
        $stmt->execute();

        return $stmt->fetchColumn()>0;
    }



}