<?php

$id = Request::input('person');

if (!$id) {
    die('A person is required!');
}

$person = $query->select('people', $id);

require 'views/edit.view.php';
