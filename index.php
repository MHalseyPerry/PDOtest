<?php

require 'functions.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$db = connectToDB();
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$names = fetchAll($db);



require 'index.view.php';
