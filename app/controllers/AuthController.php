<?php

namespace App\Controllers;
use App\Models\User;

class AuthController {
    private $user;

    public function __construct($db) {
        $this->user = new User($db);
    }

    public function login($data) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $data['login'];
            $password = $data['password'];

            if (empty($login) || empty($password)) {
                echo "Todos os campos são obrigatórios.";
                return;
            }

            $user = $this->user->findByEmail($login);

            if ($user && password_verify($password, $user['senha'])) {
                session_start();
                $_SESSION['user_id'] = $user['id_usuario'];
                header('Location: /home'); // Redireciona para o dashboard
            } else {
                echo "Login ou senha inválidos.";
            }
        } else {
            view('login'); // Renderiza a página de login
        }
    }
}
