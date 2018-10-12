<?php
require 'QueryBuilder.php';
$db = new QueryBuilder('root','');

if(isset($_POST['delete'])) {

    $id = $_POST['person_id'] ?? false;

    $successful = $db->deleteEntry($db, $id);


    if ($successful) {

        header("Location: /index.php");
    } else {
        echo 'fail';
    }
}

if (isset($_POST['add'])) {
    $firstName = $_POST['first_name'] ?? false;
    $lastName = $_POST['last_name'] ?? false;

    $successful = $db->addEntry($db, $firstName, $lastName);

    if ($successful) {
        header("Location: /index.php");
    } else {
        echo 'fail';
    }
}
