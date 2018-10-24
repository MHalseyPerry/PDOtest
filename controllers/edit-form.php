<?php

$id = $_GET['person'] ?? false;

if (!$id) {
    die('A person is required!');
}

$person = $query->selectOne('people', $id);

require 'views/edit.view.php';
