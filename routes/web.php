<?php
use App\Controllers\UserController;

$db = (new Database())->getConnection();
$userController = new UserController($db);

$requestUri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$routes = [
    'GET' => [
        '/' => function() {
            view('Auth/login');
        },
        '/users' => function() use ($userController) {
            $userController->index();
        },
        '/users/create' => function() use ($userController) {
            $userController->create();
        },
        '/users/(\d+)' => function($id) use ($userController) {
            $userController->show($id);
        },
    ],
    'POST' => [
        '/users' => function() use ($userController) {
            $userController->store($_POST);
        },
    ],
];

$found = false;

if (isset($routes[$method])) {
    foreach ($routes[$method] as $pattern => $action) {
        if (preg_match('#^'.$pattern.'$#', $requestUri, $matches)) {
            array_shift($matches);
            $action(...$matches);
            $found = true;
            break;
        }
    }
}

if (!$found) {
    view('errors/404', ['viewName' => $requestUri]);
}