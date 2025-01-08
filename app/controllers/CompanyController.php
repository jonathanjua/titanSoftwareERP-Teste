<?php

namespace App\Controllers;
use App\Models\Company;


class CompanyController
{
    private $company;

    public function __construct($db)
    {
        $this->company = new Company($db);
    }

    public function index()
    {
        $companies = $this->company->getAll();
        view('companies/index', ['companies' => $companies]);
    }

    public function create()
    {
        view('companies/create');
    }

    public function store($data)
    {
        $this->company->create($data['nome']);
        header('Location: /home');
    }

    public function show($id)
    {
        $company = $this->company->findById($id);
        view('companies/show', ['company' => $company]);
    }

    public function edit($id)
    {
        $company = $this->company->findById($id);
        view('companies/edit', ['company' => $company]);
    }

    public function update($id, $data)
    {
        $this->company->update($id, $data['name']);
        header('Location: /companies');
    }

    public function destroy($id)
    {
        $this->company->delete($id);
        header('Location: /companies');
    }
}
