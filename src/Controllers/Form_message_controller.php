<?php

namespace PROJECT\Controllers;
USE PROJECT\Models\Form_message;

class Form_message_controller
{
    public function message(array $data): void
    {
        if(empty($data['name']))
        {
            die ("Please write name");
        }

        if(empty($data['email']))
        {
            die ("Please write email");
        }

         if(empty($data['phone']))
        {
            die ("Please enter phone number");
        }

        if(empty($data['message']))
        {
            die ("Please write message");
        }


        $message = new Form_message;
        $message -> new_message($data['name'],$data['email'],$data['phone'],$data['message']);
    }
}