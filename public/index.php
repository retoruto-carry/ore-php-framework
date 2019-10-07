<?php

require __DIR__ . '/../vendor/autoload.php';

$routes = require __DIR__. '/../app/routes.php';

$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$not_found = function () {
    return [404, ['Content-Type' => 'text/html'], "<h1> 404 not found</h1>"];
};

$f = $routes[$request_uri] ?? $not_found;
[$status, $headers, $body] = $f();
http_response_code($status);
foreach ($headers as $name => $h) {
    header("{$name} {$h}");
}
echo $body;
