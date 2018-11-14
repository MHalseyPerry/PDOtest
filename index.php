<?php

/**
 * This is the entry point for the application. All URIs
 * point here, where the router decides what to do.
 *
 * Any variables we declare here will be accessible
 * throughout the app, as we are effectively just requiring
 * everything we need into this file.
 */

// Require composers autoload controller to add all classes
require 'vendor/autoload.php';

// First we need to pull in the bootstrap file, check
// the comments in there to see whats happening.
$app = require 'core/bootstrap.php';

// We create an alias for $app['builder'] so we don't have to keep typing that out,
// we can just type $query instead.
$query = $app['builder'];

// Now, we want to load our router and handle the current request.
// Look at the Router class comments to see what's happening here.
require Router::load('routes.php')
    ->handle(
        // The handle method takes 2 parameters; the request method (GET, POST, etc.)
        // and the current URI (/add, /edit, etc.). We get these from the Request class.
        // Take a look at that class to see what's happening there.
        Request::method(),
        Request::uri()
    );

// We put 'require' there because we want to require the return value of 'handle'.
// Route::load() creates an instance of the Router class, but we then call ->handle,
// which returns a string, on it _straight_ away. This is called chaining.
