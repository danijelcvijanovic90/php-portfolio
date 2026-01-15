<?php
namespace PROJECT\Controllers;
use PROJECT\Models\Order;
use DateTime;

class Order_controller
{
public function get_week_start(): string
    {
        $order_model=new Order();
        return $week_start=$order_model->get_week_start();
    }

    public function add_meal_to_user_order(int $user_id,string $week_start,int $menu_id,int $meal_id): bool
    {
        $order_date=date("Y-m-d");
        $days_diff=(new DateTime($order_date))->diff(new DateTime($week_start))->days;
        $current_week=floor($days_diff/7);

        $order=new Order();
        $check_current_week=$order->check_current_week($user_id,$menu_id,$current_week);

        if($check_current_week)
            {
                return false;
            }

        return $add_to_order=$order->add_meal_to_user_order($user_id,$menu_id,$current_week,$meal_id);
    }

    public function get_current_week(int $user_id): int
    {
        $order=new Order();
        return $current_week=$order->get_current_week($user_id);
    }

      public function user_menu(int $category_id): array
    {
        $order_model=new Order();
        $order=$order_model->user_menu($category_id);
        return $order;
    }

    public function user_orders(int $user_id,string $week_start, int $current_week): array
    {
        $current_date=date("Y-m-d");
        $days_diff=(new DateTime($current_date))->diff(new DateTime($week_start))->days;
        $current_week_now=floor($days_diff/7);

        $order=new Order();

        if($current_week_now == $current_week)
        {
            return $orders=$order->user_orders($user_id,$current_week);
        }

        else
        {
            return [];
        }
    }

    public function delete_order_by_user(int $user_id,int $order_id): bool
    {
        $order=new Order();
        return $delete_user=$order->delete_order_by_user($user_id,$order_id);
    }
}


