<?php

declare(strict_types=1);

session_start();

require_once __DIR__ . '/app/core/helpers.php';
require_once __DIR__ . '/app/core/Controller.php';
require_once __DIR__ . '/app/core/Database.php';

spl_autoload_register(function (string $class): void {
    $paths = [
        __DIR__ . '/app/controllers/' . $class . '.php',
        __DIR__ . '/app/models/' . $class . '.php',
    ];

    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

$page = $_GET['page'] ?? 'home';

$routes = [
    'home' => ['PageController', 'home'],
    'output1' => ['StudentController', 'create'],
    'output2-register' => ['AuthController', 'register'],
    'output2-login' => ['AuthController', 'login'],
    'output2-forgot' => ['AuthController', 'forgotPassword'],
    'registrations' => ['RegistrationController', 'index'],
    'faculty' => ['FacultyController', 'index'],
];

if (!isset($routes[$page])) {
    http_response_code(404);
    echo 'Page not found.';
    exit;
}

[$controllerName, $method] = $routes[$page];
$controller = new $controllerName();
$controller->$method();
