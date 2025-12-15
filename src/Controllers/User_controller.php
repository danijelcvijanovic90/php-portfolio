<?php

namespace PROJECT\Controllers;
use PROJECT\Services\Session_service;
use PROJECT\Models\User;
use PROJECT\Models\Company;


class User_controller
{
    public function login(array $data)
    {
        if(empty($data['username']))
        {
            die("Please provide username");
        }

        if(empty($data['password']))
        {
            die("Please provide password");
        }

        $username = trim($data['username']);
        $username_lower = strtolower($username);
        $password = trim($data['password']);
        
        $user = new User();

        $user_data = $user->get_user_by_username($username_lower);

        if(!$user_data)
        {
            die ("User does not exists");
        }

        $password_verify = password_verify($password,$user_data['password']);

        if(!$password_verify)
        {
            die ("Password does not match!");
        }

        $session = new Session_service;
        $session->set_session("user_id",$user_data["id"]);

        switch($user_data['role'])
        {
            case "user":
                $session->set_session("logedin",true);
                header ("location: user/user_dashboard.php");
                exit;

            case "admin":
                $session->set_session("logedin_admin",true);
                header ("location: admin/admin_dashboard.php");
                exit;

            default:
                die ("Uknown user role");
        }
        
    }
    

    public function all_companies()
    {
        $companies = new Company();
        return $companies->get_all_companies();
    }

    public function new_user(array $data): void
    {
        $user = new User();
        $company_id = intval($data['company']);
        $email = empty($data['email']) ? null : $data['email']; //if email is empty set null if it not empty insert email from $_POST;
        
        $password="defaultpassword";
        $password_hash = password_hash($password,PASSWORD_BCRYPT);
        $random = random_int(100, 999);
        $username = $data['name'].".".$data['surname']. $random;
        $username_lower=strtolower($username);
        $user->add_user($data['name'],$data['surname'],$email,$password_hash,$data['role'],$company_id,$username_lower);

       $session = new Session_service();
       $session->set_session("success","User successfully added");

       header("location: get_users_and_companies.php");
       exit;
       //stay on page with settings because we need to show success message.
    }


    public function show_user(): array
    {
        $user = new User();
        
        return $user->get_all_users();
    }

    public function user_by_company($company_id): array
    {
        $user=new User();
        return $users = $user->get_user_by_company($company_id);
    }
   
}
