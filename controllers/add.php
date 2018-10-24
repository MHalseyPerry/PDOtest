<?php

$firstName = Request::input('first_name');
$lastName = Request::input('last_name');

$successful = $query->addEntry($firstName, $lastName);

if ($successful) {
    header ('Location: /');
} else {
    die('failed');
}
