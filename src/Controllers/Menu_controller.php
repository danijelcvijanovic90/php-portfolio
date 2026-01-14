<?php

namespace PROJECT\Controllers;
use PROJECT\Models\Menu;
use DateTime;

class Menu_controller
{
    public function get_day(string $day): array
    {
        $menu=new Menu();
        return $day=$menu->get_day($day);   
    }

    public function get_all_days(): array
    {
        $menu=new Menu();
        return $days=$menu->get_all_days();
    }

    public function add_product(array $data): bool
    {
        if(empty($data['menu_id']) || empty($data['meal_id']))
        {
            return false;
        }
       
        $menu_id=(int)$data['menu_id'];
        $meal_id=(int)$data['meal_id'];
        $menu=new Menu();
        return $meal=$menu->add_product($menu_id,$meal_id);
    }

    public function menu_day(string $day): array
    {
        if(empty($day))
        {
            return false;
        }

        $menu=new Menu();
        return $result=$menu->menu_day($day);
    }

    public function delete_from_menu_meal_by_meal_id_and_menu_id(array $data): bool
    {
        if(empty($data['meal_id'] || empty($data['menu_id'])))
        {
            return false;
        }

        $meal_id=(int)$data['meal_id'];
        $menu_id=(int)$data['menu_id'];

        $menu=new Menu();
        return $delete=$menu->delete_from_menu_meal_by_meal_id_and_menu_id($data['meal_id'], $data['menu_id']);
    }

    public function user_menu(int $category_id): array
    {
        $user_model=new Menu();
        $user=$user_model->user_menu($category_id);
        return $user;
    }

    public function get_week_start(): string
    {
        $menu_model=new Menu();
        return $week_start=$menu_model->get_week_start();
    }

    public function add_meal_to_user_menu(int $user_id,string $week_start,int $menu_id,int $meal_id): bool
    {
        $order_date=date("Y-m-d");
        $days_diff=(new DateTime($order_date))->diff(new DateTime($week_start))->days;
        $current_week=floor($days_diff/7);

        $menu=new Menu();
        $check_current_week=$menu->check_current_week($user_id,$menu_id,$current_week);

        if($check_current_week)
            {
                return false;
            }

        return $add_to_menu=$menu->add_meal_to_user_menu($user_id,$menu_id,$current_week,$meal_id);
    }

    public function get_current_week(int $user_id): int
    {
        $menu=new Menu();
        return $current_week=$menu->get_current_week($user_id);
    }

    public function user_orders(int $user_id,string $week_start, int $current_week): array
    {
        $current_date=date("Y-m-d");
        $days_diff=(new DateTime($current_date))->diff(new DateTime($week_start))->days;
        $current_week_now=floor($days_diff/7);

        $menu=new Menu();

        if($current_week_now == $current_week)
        {
            return $orders=$menu->user_orders($user_id,$current_week);
        }

        else
        {
            return [];
        }
    }

    public function delete_order_by_user(int $user_id,int $order_id): bool
    {
        $menu=new Menu();
        return $delete_user=$menu->delete_order_by_user($user_id,$order_id);
    }

    
}