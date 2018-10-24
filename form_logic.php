<?php

$query = require 'bootstrap.php';

if (isset($_POST['add'])) {
    $firstName = $_POST['first_name'] ?? false;
    $lastName = $_POST['last_name'] ?? false;

    $successful = $query->addEntry($firstName, $lastName);

    if ($successful) {
        header("Location: /index.php");
    } else {
        echo 'fail';
    }
}

if (isset($_POST['edit'])) {
    $firstName = $_POST['first_name'] ?? false;
    $lastName = $_POST['last_name'] ?? false;
    $id = $_POST['id'];
    $successful = $query->editEntry($id, $firstName, $lastName);

    if ($successful) {
        header("Location: /index.php");
    } else {
        echo 'fail';
    }
}
