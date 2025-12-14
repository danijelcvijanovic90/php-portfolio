<?php

namespace PROJECT\Controllers;
use PROJECT\Models\Company;


class Company_controller 
{


    public function new_company(array $data)
    {
       
        if(empty($data['name']))
        {
            die("Please provide company name");
        }

        if(empty($data['address']))
        {
            die("Plase provide company name");
        }

        $company = new Company();
            
        if($company->company_exists($data['name']))
        {
            die("Company allready exists");
        }

        $company->add_company($data['name'],$data['address'],$data['notes']);

       

    }
}