<?php

require './src/controllers/Authorization/LoginController.php';
require './src/controllers/Authorization/RegisterController.php';
require './src/controllers/DefaultController.php';
require './src/controllers/DashboardController.php';
require './src/controllers/UserController.php';

#TODO: Make Routing be less available for other classes and files!


class  Routing
{
    # Nobody should have permission to get into $routes variable! It is risky, and probability that error occurs highly rises.
    private static $routes;

    public static function get($endpoint, $controller, $action)
    {
        self::$routes['get'][$endpoint] = ['name' => $controller, 'action' => $action];
    }

    public static function post($endpoint, $controller, $action)
    {
        self::$routes['post'][$endpoint] = ['name' => $controller, 'action' => $action];
    }

    public static function run($url, $method)
    {

        $endpoint = explode("/", $url)[0];

        if (!array_key_exists($endpoint, self::$routes[$method]))
            die("Wrong url!");

        $controller = self::$routes[$method][$endpoint];

        $object = new $controller['name'];
        $action = $controller['action'];
        $object->$action();

    }
}