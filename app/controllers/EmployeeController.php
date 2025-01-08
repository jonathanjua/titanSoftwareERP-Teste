<?php

namespace App\Controllers;

use App\Models\Company;
use App\Models\Employee;


class EmployeeController
{
    private $employee, $company;

    public function __construct($db)
    {
        $this->employee = new Employee($db);
        $this->company = new Company($db);
    }

    public function index()
    {
        $employees = $this->employee->getAll();

        view('employees/index', ['employees' => $employees]);
    }

    public function create()
    {
        $companys = $this->company->getAll();
        view('employees/create', ['companys' => $companys]);
    }

    public function store($data)
    {
       $employee = $this->employee->create($data['nome'], $data['cpf'], $data['email'], $data['rg'], $data['id_empresa']);
        
        if(!$employee){
            header('Location: /employees/create');
            return;
        }

        header('Location: /home');
    }

    public function show($id)
    {
        $employee = $this->employee->findById($id);
        view('employees/show', ['employee' => $employee]);
    }

    public function edit($id)
    {
        $employee = $this->employee->findById($id);
        view('employees/edit', ['employee' => $employee]);
    }

    public function update($id, $data)
    {
        $this->employee->update($id, $data['name'], $data['cpf'], $data['email'], $data['rg'], $data['id_empresa']);
        header('Location: /employees');
    }

    public function destroy($id)
    {
        $this->employee->delete($id);
        header('Location: /employees');
    }
}