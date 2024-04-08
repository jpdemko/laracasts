<?php

$path = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];

route_to_controller($path, $routes);

function route_to_controller($path, $routes)
{
    if (array_key_exists($path, $routes)) {
        require $routes[$path];
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);
    require "views/{$code}.php";
    die();
}
