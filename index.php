<?php

require 'functions.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$db = connectToDB('root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$names = fetchAll($db);

if ($_POST) {
    // We get the first and last name from the post request here
    $firstName = $_POST['first_name'] ?? false;
    $lastName = $_POST['last_name'] ?? false;

    // And pass them to the add entry function.
    // We store the new result of the add entry function
    // to determine if the SQL insert was successful or not.
    $successful = addEntry($db, $firstName, $lastName);

    // If we were successful, redirect - moved out of the addEntry function
    if ($successful) {
        // I've removed the domain part of the location.
        // this works exactly the same, no matter what domain
        // we're running on. Before, you would have had to change
        // your code when you upload it to the server
        // otherwise your post would redirect to an invalid domain.
        header("Location: /index.php");
    } else {
        echo 'fail'; // also moved here from the `addEntry` function
    }
}

require 'index.view.php';
