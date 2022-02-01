<?php

require 'src/controllers/ViewsController.php';
require 'src/controllers/LoginController.php';
require 'src/controllers/ItemController.php';
require 'src/controllers/RegisterController.php';

class  Routing
{

    private static $routes = [];

    public static function get($action, $controller)
    {
        self::$routes['GET'][$action] = $controller;
    }

    public static function post($action, $controller)
    {
        self::$routes['POST'][$action] = $controller;
    }


    public static function run($action)
    {

        $METHOD = $_SERVER['REQUEST_METHOD'];
        if (!key_exists($action, self::$routes[$METHOD]))
            die('');

        $controller = self::$routes[$METHOD][$action];
        $object = new $controller;
        $object->$action();


    }

}
