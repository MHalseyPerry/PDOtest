<?php

$query = require 'core/bootstrap.php';

$router = new Router();

$routes = require 'routes.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = explode('?', $_SERVER['REQUEST_URI'])[0];

// die(var_dump($_SERVER));

require $router->direct($method, $uri);
