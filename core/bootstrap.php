<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'core/Router.php';
require 'core/Request.php';

require 'core/database/Connection.php';
require 'core/database/QueryBuilder.php';
$config = require 'config.php';

return new QueryBuilder(
    Connection::make($config['database'])
);
