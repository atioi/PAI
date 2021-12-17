<?php


class  Routing
{
    public static $routes;

    public static function get($action, $controller)
    {
        self::$routes[$action] = $controller;
    }

    public static function run($url)
    {

        $action = explode("/", $url)[0];
        if (!array_key_exists($action, self::$routes))
            die("Wrong url!");

        $controller = new self::$routes[$action];
        $controller->$action();


    }


}