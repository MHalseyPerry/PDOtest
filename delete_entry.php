<?php

require 'functions.php';
$db = connectToDB();

if($_POST) {

    $id = $_POST['person_id'] ?? false;

    $successful = deleteEntry($db, $id);


    if ($successful) {

        header("Location: /index.php");
    } else {
        echo 'fail';
    }
}

?>
