<?php

/**
 * This class handles creating a PDO connection.
 */

class Connection
{
    /**
     * Attempts to create a PDO instance.
     *
     * @param array $config The database config we need to connect
     * @return PDO
     */
    public static function make($config)
    {
        // We wrap our logic in a try/catch so that we can terminate
        // the app if it fails.
        try {
            // Simply return a new PDO connection, configured with
            // all of the data we need.
            return new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $e) {
            // Die with the error message
            die($e->getMessage());
        }
    }
}
