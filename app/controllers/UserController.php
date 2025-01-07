<?php

namespace App\Controllers;
use App\Models\User;

class UserController
{
    private $user;

    public function __construct($db)
    {
        $this->user = new User($db);
    }

    public function index()
    {
        $users = $this->user->getAll();
        view('users/index', ['users' => $users]);
    }

    public function create()
    {
        view('users/create');
    }

    public function store($data)
    {
        $this->user->create($data['name'], $data['email'], $data['password']);
        header('Location: /users');
    }

    public function show($id)
    {
        $user = $this->user->findById($id);
        view('users/show', ['user' => $user]);
    }
}