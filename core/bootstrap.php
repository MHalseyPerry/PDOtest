<?php

/**
 * This file sets up all of our requirements, and builds the app into the $app variable.
 */

// First, we enable error reporting.
ini_set('display_errors', 1);
error_reporting(E_ALL);




// We create the $app array, which will house all of our integral parts of the app.
$app = [];

// Add the config into the array
$app['config'] = require 'core/database/config.php';

// Add the PDO connection to the array, passing it the database config
// that we added to the array beforehand. Take a look at the Connection.php
// file to see what's happening here.
$app['pdo'] = Connection::make($app['config']['database']);

// Create a query builder instance, passing it the PDO connection we just made,
// and store that into the array, too.
$app['builder'] = new QueryBuilder($app['pdo']);

// Now return the $app array, so that it can be used elsewhere.
return $app;
