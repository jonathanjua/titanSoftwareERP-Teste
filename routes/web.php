<?php
use App\Controllers\UserController;
use App\Controllers\AuthController;
use App\Controllers\CompanyController;
use App\Controllers\EmployeeController;
use App\Controllers\HomeController;

$db = (new Database())->getConnection();
$homeController = new HomeController($db);
$userController = new UserController($db);
$authController = new AuthController($db);
$companyController = new CompanyController($db);
$employeeController = new EmployeeController($db);

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
        '/home' => function() use ($homeController) {
            $homeController->index();    
        }, 
        '/companies' => function() use ($companyController) {
            $companyController->index();
        },
        '/company/create' => function() use ($companyController) {
            $companyController->create();
        },
        '/company/(\d+)' => function($id) use ($companyController) {
            $companyController->show($id);
        },
        '/employees/create' => function() use ($employeeController) {
            $employeeController->create();
        },
    ],
    'POST' => [
        '/users' => function() use ($userController) {
            $userController->store($_POST);
        },
        '/auth/login' => function() use ($authController) {
            $authController->login($_POST);
        },
        '/company/store' => function() use ($companyController) {
            $companyController->store($_POST);
        },
        '/employees/store' => function() use ($employeeController) {
            $employeeController->store($_POST);
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