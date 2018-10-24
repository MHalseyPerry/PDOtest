<?php

$router->get('/', 'controllers/index.php');
$router->get('/add', 'controllers/add-form.php');
$router->post('/add', 'controllers/add.php');
$router->get('/edit', 'controllers/edit-form.php');
$router->post('/edit', 'controllers/edit.php');
$router->get('/delete', 'controllers/delete.php');
