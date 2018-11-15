<?php

/**
 * The router class handles all of the logic around routing.
 */

class Router
{
    /**
     * All the registered routes for the app are stored here.
     *
     * @var array
     */
    protected $routes = [
        // All routes that can be accessed via GET are stored in this array
        'GET' => [],
        // and all the routes that can be accessed via POST are stored in this array.
        'POST' => [],
    ];

    /**
     * Registers a route that can be accessed via GET.
     *
     * @param string $uri The URI to be accessed.
     * @param string $controller The file that should run when the URI is accessed.
     * @return void
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * Registers a route that can be accessed via POST.
     *
     * @param string $uri The URI to be accessed.
     * @param string $controller The file that should run when the URI is accessed.
     * @return void
     */
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * This gets the controller that should be used for the specified uri and method.
     *
     * @param string $method The method to look for. GET or POST.
     * @param string $uri The URI to look for.
     * @return string The controller file that should be run.
     */
    public function handle($method, $uri)
    {
        // First we check that the specified route has been registered
        // under the specified method.
        if (array_key_exists($uri, $this->routes[$method])) {
            // It has, so return the value for it, which will be the controller path.
            return $this->callAction(
                ...explode('@', $this->routes[$method][$uri])
            );
        }

        // We didn't find any routes, so throw an exception.
        // You may want this to return a 404 page, like https://google.com/404
        throw new Exception("No route defined for $method $uri");
    }

    /**
     * This is where the magic happens. This method instantiates the class (itself)
     * and loads all of the routes you defined in your routes file.
     *
     * @param string $file This is a path to a file in which you define all of your routes.
     * @return self
     */

    protected function callAction($controller, $action){

        if(! method_exists($controller, $action)){
            throw new Exception(
                    "{$controller} does not respond to the {$action} action"
            );
        }

        return(new $controller)->$action();

    }



    public static function load($file)
    {
        // First, we create an instance of this class (self). This load() method is static,
        // so we're not running on an instance of the Router class, so we make one here.
        $router = new self();

        // Now we require the specified file. It will have access to the $router file, because
        // we just defined it above.
        require $file;

        // Now, we return the router instance.
        return $router;
    }
}
