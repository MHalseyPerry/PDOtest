<?php



// yeah you need to call the order function not the selectall function?
$persons = App::get('builder')->selectAll('people');

require 'views/index.view.php';

// no prob leme know if u have question....brb
// come to QueryBuilder my friend
// i have added orderin as bun
