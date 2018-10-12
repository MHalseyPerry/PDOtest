<?php

require 'QueryBuilder.php';


ini_set('display_errors', 1);
error_reporting(E_ALL);



$db = new QueryBuilder('root','');
$names = $db->fetchAll('names');

require 'index.view.php';
