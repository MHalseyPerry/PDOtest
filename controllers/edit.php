<?php

$id = Request::input('id');
$firstName = Request::input('first_name');
$lastName = Request::input('last_name');

$successful = $query->editEntry($id, $firstName, $lastName);

if ($successful) {
    header('Location: /');
} else {
    die('failed');
}
