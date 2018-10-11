<?php

require 'functions.php';
$db = connectToDB();

if($_POST['delete']) {

    $id = $_POST['person_id'] ?? false;

    $successful = deleteEntry($db, $id);


    if ($successful) {

        header("Location: /index.php");
    } else {
        echo 'fail';
    }
}

if ($_POST['add']) {
    $firstName = $_POST['first_name'] ?? false;
    $lastName = $_POST['last_name'] ?? false;

    $successful = addEntry($db, $firstName, $lastName);

    if ($successful) {
        header("Location: /index.php");
    } else {
        echo 'fail';
    }
}

?>
