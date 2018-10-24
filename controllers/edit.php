<?php

$id = Request::input('id');
$firstName = Request::input('first_name');
$lastName = Request::input('last_name');

$successful = $query->update('people', $id, [
    'first_name' => $firstName,
    'last_name' => $lastName,
]);

if ($successful) {
    header('Location: /');
} else {
    die('failed');
}
