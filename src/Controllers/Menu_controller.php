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

  
    
}