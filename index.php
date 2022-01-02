<?php

require 'Routing.php';
require_once './src/controllers/DefaultController.php';



# $_SERVER  is global variable available on server.

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);
$method = strtolower($_SERVER['REQUEST_METHOD']);


# If action is not appended into URL then rootAction runs.
# The rootAction is default set to 'index' but can be changed using Routing::setRootAction method.


# Get actions:
Routing::get('', "DefaultController");
Routing::get('login', "DefaultController");
Routing::get('register', "DefaultController");
Routing::get('uploads', "DefaultController");
Routing::get('dashboard', "DefaultController");
Routing::get('hello', "DefaultController");
Routing::get('indev', "DefaultController");
Routing::get('portrait', "UploadController");


# Post actions:
Routing::post('login', "LoginController");
Routing::post('register', "RegisterController");
Routing::post('portrait', "UploadController");


# Runs appropriate controller from ./controllers
Routing::run($path, $method);

