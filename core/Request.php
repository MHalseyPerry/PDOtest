<?php

class Request
{
    public static function uri()
    {
        return explode('?', $_SERVER['REQUEST_URI'])[0];
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function input($key, $default = null)
    {
        if (self::method() === 'GET') {
            return $_GET[$key] ?? $default;
        } else {
            return $_POST[$key] ?? $default;
        }
    }
}
