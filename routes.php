<?php

// This is where we define all of our routes.
// We have access to our $router variable, and the methods
// 'get' and 'post'. They both take a URI and a controller file.

$router->get('/', 'controllers/index.php'); // Home page

$router->get('/add', 'controllers/add-form.php'); // The add entry form
$router->post('/add', 'controllers/add.php'); // The logic that adds a new entry then redirects

$router->get('/edit', 'controllers/edit-form.php'); // The edit entry form
$router->post('/edit', 'controllers/edit.php'); // The logic that edits entries then redirects

$router->get('/delete', 'controllers/delete.php'); // The logic that delete entries

$router->get('/contact', 'controllers/contact.php');
$router->get('/about', 'controllers/about.php');
