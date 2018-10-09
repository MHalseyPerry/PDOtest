<?php
require 'functions.php';
$db = connectToDB();

if ($_POST) {
    $firstName = $_POST['first_name'] ?? false;
    $lastName = $_POST['last_name'] ?? false;

    $successful = addEntry($db, $firstName, $lastName);

    if ($successful) {
        header("Location: /index.php");
    } else {
        echo 'fail';
    }
}


