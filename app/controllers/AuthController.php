<?php
require_once 'app/helpers.php';
use App\Models\User;

class AuthController {
    private $user;

    public function __construct($db) {
        $this->user = new User($db);
    }

    public function login() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['login'];
            $password = $_POST['password'];

            if (empty($login) || empty($password)) {
                echo "Todos os campos são obrigatórios.";
                return;
            }

            $user = $this->user->findByEmail($login);
            
            if ($user && password_verify($password, $user['senha'])) {
                session_start();
                $_SESSION['user_id'] = $user['id_usuario'];
                header('Location: /dashboard'); // Redireciona para o dashboard
            } else {
                echo "Login ou senha inválidos.";
            }
        } else {
            view('login'); // Renderiza a página de login
        }
    }
}
