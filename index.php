<?php

$query = require 'core/bootstrap.php';

$router = new Router();

$routes = require 'routes.php';


require Router::load('routes.php')
    ->handle(Request::method(), Request::uri());
