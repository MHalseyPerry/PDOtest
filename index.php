<?php

require 'functions.php';
require 'QueryBuilder.php';


ini_set('display_errors', 1);
error_reporting(E_ALL);

$db = connectToDB();
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = new QueryBuilder($db);

$names = $query->fetchAll('names');

require 'index.view.php';
