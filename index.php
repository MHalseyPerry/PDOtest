<?php

require 'QueryBuilder.php';
$config = require 'config.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);



$db = new QueryBuilder($config['database']);
$persons = $db->fetchAll('people');

require 'index.view.php';
