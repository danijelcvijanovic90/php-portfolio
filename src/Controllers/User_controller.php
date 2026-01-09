<?php

namespace PROJECT\Controllers;
use PROJECT\Services\Session_service;
use PROJECT\Models\User;
use PROJECT\Models\Company;


class User_controller
{
    public function login(array $data): array
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
        $session->set_session("user_pass",$user_data["password_update"]);
       
        switch($user_data['role'])
        {
            case "user":
                $session->set_session("logedin_user",true);

                if($session->get_from_session('user_pass') == 1)
                {
                header ("location: user/user_dashboard.php");
                exit;
                }
                header ("location: user/change_password.php");
                exit;
                

            case "admin":
                $session->set_session("logedin_admin",true);
                header ("location: admin/admin_dashboard.php");
                exit;

            default:
                header ("location: index.php");
        }
    }
    

    public function all_companies()
    {
        $companies = new Company();
        return $companies->get_all_companies();
    }

    public function new_user(array $data): bool
    {
        $user = new User();
        $company_id = intval($data['company']);
        $email = empty($data['email']) ? null : $data['email']; //if email is empty set null if it not empty insert email from $_POST;
        
        $password="defaultpassword";
        $password_hash = password_hash($password,PASSWORD_BCRYPT);
        $random = random_int(100, 999);
        $username = $data['name'].".".$data['surname']. $random;
        $username_lower=strtolower($username);
        $password_update=0;
        $result=$user->add_user($data['name'],$data['surname'],$email,$password_hash,$data['role'],$company_id,$username_lower,$password_update);

        return $result;
    }


    public function show_user(): array
    {
        $user=new User();
        return $user->get_all_users_and_companies();
    }

    public function edit_user(array $data): bool
    {   
        if(empty($data['name']) || empty($data['surname']) || empty($data['role']) || empty($data['username']))
        {
            return false;
        }

        $update_user=new User();
        $data_id = (int)$data['id'];
        $email=$data['email'] ?? null;
        $password_update=(int)$data['password_update'];
        if(!empty($data['password']) && $data['password'] === $data['confirm_password'])
        {   
            $password_hash=password_hash($data['password'],PASSWORD_BCRYPT);
            $update_user->update_user_with_password($data_id,$data['name'],$data['surname'],$email,$password_hash,$data['role'],$data['username'],$password_update);
        }
        else
        {
            $update_user->update_user_without_password($data_id,$data['name'],$data['surname'],$email,$data['role'],$data['username'],$password_update);
        }

        return true;
    }

    public function show_user_by_id(int $id): array
    {   
        if(!isset($id) || empty($id))
        {
            return false;
        }

        $user=new User();
        return $result=$user->get_user_by_id($id);   
    }

    public function user_by_company($company_id): array
    {
        $user=new User();
        return $users=$user->get_user_by_company($company_id);
    }

    public function delete_user(int $id): bool
    {   
        if(!isset($id) || empty($id))
        {
            return false;
        }
        
        $user=new User();
        return $result=$user->delete_user_by_id($id);
    }

    public function password_not_changed_check_by_user_id(int $id): bool
    {
        $user_model=new User();
        $user=$user_model->password_not_changed_check_by_user_id($id);
        $session=new Session_service();
        return $user;

        if($user)
        {
            $session->set_session("password_changed",false);
        }
        else
        {
            $session->set_session("password_changed",true);
        }

        
    }

    public function update_password_with_user_id(int $user_id,array $data): mixed
    {
        $password=$data['password'];
        $password_repeat=$data['confirm_password'];
        $error=[];

        if(strlen($password) < 8)
        {
           $error[]="Password must be at least 8 characters long!";
        }

        if(preg_match('/\s/',$password))
        {
            $error[]='Password must not contain spaces!';
            
        }

        if($password != $password_repeat)
        {
            $error[]='Password does not match!';
        }

        if(!empty($error))
        {
            return $error;
        }

        $password_hash=password_hash($password,PASSWORD_BCRYPT);
        $user_model=new User();
        return $user_model->update_password_with_user_id($user_id,$password_hash); 
        
    }
   
}
