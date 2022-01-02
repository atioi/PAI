<?php

require './src/controllers/Authorization/LoginController.php';
require './src/controllers/Authorization/RegisterController.php';
require './src/controllers/DefaultController.php';
require './src/controllers/Authorized/UploadController.php';


#TODO: Make Routing be less available for other classes and files!

class  Routing
{
    # Nobody should have permission to get into $routes variable! It is risky, and probability that error occurs highly rises.
    private static $routes;
    # $rootAction is an action that runs when url looks like this "/" so action is not define in it.
    private static $rootAction = 'index';

    public static function get($action, $controller)
    {
        self::$routes['get'][$action] = $controller;
    }

    public static function post($action, $controller)
    {
        self::$routes['post'][$action] = $controller;
    }

    public static function setRootAction($action)
    {
        self::$rootAction = $action;
    }

    public static function run($url, $method)
    {

        $action = explode("/", $url)[0];

        if (!array_key_exists($action, self::$routes[$method]))
            die("Wrong url!");

        $controller = new self::$routes[$method][$action];
        $action = $action ?: self::$rootAction;
        $controller->$action();

    }

}