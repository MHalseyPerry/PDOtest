<?php
require 'QueryBuilder.php';
$db = new QueryBuilder('root','');


if (isset($_POST['add'])) {
    $firstName = $_POST['first_name'] ?? false;
    $lastName = $_POST['last_name'] ?? false;

    $successful = $db->addEntry($firstName, $lastName);

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
    $successful = $db->editEntry($id,$firstName, $lastName);

    if ($successful) {
        header("Location: /index.php");
    } else {
        echo 'fail';
    }
}
