<?php

$firstName = $_POST['first_name'] ?? false;
$lastName = $_POST['last_name'] ?? false;

$successful = $query->addEntry($firstName, $lastName);

if ($successful) {
    header ('Location: /');
} else {
    die('failed');
}
