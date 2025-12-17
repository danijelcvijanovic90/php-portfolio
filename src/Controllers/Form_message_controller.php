<?php

namespace PROJECT\Controllers;
USE PROJECT\Models\Form_message;

class Form_message_controller
{
    public function message(array $data): bool
    {
        
        if (empty($data['name']) || empty($data['message']) || empty($data['phone']) || empty($data['email']) || empty($data['subject'])) {
            return false;
        }

        $message = new Form_message();

        $inserted=$message->new_message(
            $data['name'],
            $data['email'],
            $data['phone'],
            $data['message'],
            $data['subject'] 
        );
        return $inserted;
    
    }


    public function see_messages(): array
    {
        $msg=new Form_message();
        return $result=$msg->all_messages();
    }

    public function message_by_id(int $id): array
    {
        if(empty($id))
        {
            return false;
        }

        $msg=new Form_message();
        return $result=$msg->get_message_by_id($id);
        
    }

    public function delete_message(int $id): bool
    {
         if(empty($id))
        {
            return false;
        }

        $msg= new Form_message();
        return $msg->delete_message_by_id($id);
    }
}