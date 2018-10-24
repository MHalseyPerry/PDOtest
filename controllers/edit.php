<?php

$id = $_POST['id'];
$firstName = $_POST['first_name'] ?? false;
$lastName = $_POST['last_name'] ?? false;

$successful = $query->editEntry($id, $firstName, $lastName);

if ($successful) {
    header('Location: /');
} else {
    die('failed');
}
