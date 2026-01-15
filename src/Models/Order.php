<?php
namespace PROJECT\Models;
use PROJECT\Models\Db;
use PDO;

class Order extends Db
{
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

    public function add_meal_to_user_order(int $user_id, int $menu_id, int $current_week, int $meal_id): bool
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

    public function get_orders_overview(int $current_week,int $company_id=0,int $category_id=0, int $day_id=0): array // default values if parameter does not exists
    {
        
        $sql= "
        SELECT m.day,ml.name as meal_name,c.name as category_name,
        COUNT (o.id) as total_quantity
        FROM orders o
        INNER JOIN menu as m ON o.menu_id=m.id
        INNER JOIN meals as ml ON o.meal_id=ml.id
        INNER JOIN category as c ON ml.category_id=c.id
        ";

        $where=[];
        $param=[];

        $where[]="o.current_week = :current_week";
        $param['current_week']=$current_week;

        if($company_id>0)
        {
            $where[]="company_id = :company_id";
            $param['company_id']=$company_id; // same as bindparam(":company_id",$company_id);
        }

        if($category_id>0)
        {
            $where[]="ml.category_id = :category_id";
            $param['category_id']=$category_id;
        }
        
        if($day_id>0)
        {
            $where[]="day_id = :day_id";
            $param['day_id']=$day_id;
        }

        if(!empty($where))
        {
            $sql .=" WHERE " . implode(" AND ", $where); //if not empty array $where implode array items with "AND".
        }

        $sql .=" GROUP BY m.day,ml.name ORDER BY m.day,ml.name"; // add group by and order by at the end of query.

        $stmt=$this->pdo->prepare($sql);
        $stmt->execute($param); //execute $stmt with params

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}
    
    
    