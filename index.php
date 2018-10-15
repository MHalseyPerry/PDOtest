<?php

require 'QueryBuilder.php';


ini_set('display_errors', 1);
error_reporting(E_ALL);



$db = new QueryBuilder('root','');
$persons = $db->fetchAll('people');

require 'index.view.php';
