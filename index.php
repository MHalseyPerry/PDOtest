<?php

require 'functions.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$db = connectToDB('root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$names = fetchAll($db);

if ($_POST) {
    addEntry($db);
}

require 'index.view.php';
