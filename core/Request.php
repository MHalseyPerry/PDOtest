<?php

/**
 * The request class is mostly just a container for some related methods.
 *
 * The 'uri' and 'method' methods are just proxies to access the $_SERVER variables.
 *
 * Each method has its own documentation.
 */

class Request
{
    /**
     * Gets the request uri (/add, /edit, etc).
     *
     * @return string
     */
    public static function uri()
    {
        // First, we get the request uri from the server.
        // This could be /add or /edit?person=5 for example
        $uri = $_SERVER['REQUEST_URI'];

        // We then explode it on any question marks. That means
        // '/edit?person=5' would become ['/edit', 'person=5']
        $uri = explode('?', $uri);

        // Then we just return the first element of the array - our URI.
        return $uri[0];
    }

    /**
     * Gets the current request method.
     *
     * @return string 'GET' or 'POST'
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Gets an input value, a proxy for either $_GET['key'] or $_POST['key'],
     * depending on the current method.
     *
     * @param string $key The key you wish to retrieve
     * @param mixed [$default=null] The default value to return if nothing is found.
     * @return mixed
     */
    public static function input($key, $default = null)
    {
        // We check if we're currently on a GET request
        if (self::method() === 'GET') {
            // If so, return the $_GET[$key], or the $default if nothing is there.
            return $_GET[$key] ?? $default;
        } else {
            // And do the same for $_POST, as if it's not a GET request, it must be a POST
            return $_POST[$key] ?? $default;
        }
    }
}
