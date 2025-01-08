<?php

namespace App\Controllers;

use App\Models\Employee;

class HomeController
{
    private $employee;

    public function __construct($db)
    {
        $this->employee = new Employee($db);
    }

    public function index()
    {
        $employees = $this->employee->getAll();

        foreach ($employees as &$employee) {
            $employee['company_name'] = $this->employee->getCompanyName($employee['id_empresa']);
        }
        
        view('home', ['employees' => $employees]);
    }
}