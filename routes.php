<?php

// This is where we define all of our routes.
// We have access to our $router variable, and the methods
// 'get' and 'post'. They both take a URI and a controller file.

$router->get('/', 'PagesController@home'); // Home page

$router->get('/add', 'PagesController@addform'); // The add entry form
$router->post('/add', 'PagesController@add'); // The logic that adds a new entry then redirects

$router->get('/edit', 'PagesController@editform'); // The edit entry form
$router->post('/edit', 'PagesController@edit'); // The logic that edits entries then redirects

$router->get('/delete', 'PagesController@delete'); // The logic that delete entries


$router->get('/contact', 'PagesController@contact');
$router->get('/about', 'PagesController@about');
