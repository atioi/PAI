<?php

require 'Routing.php';

require_once './src/controllers/DefaultController.php';
require_once './src/controllers/Authorization/LoginController.php';
require_once './src/controllers/Authorization/RegisterController.php';
require_once './src/controllers/AvatarController.php';
require_once './src/controllers/ItemController.php';


# $_SERVER  is global variable available on server.

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);
$method = strtolower($_SERVER['REQUEST_METHOD']);

# If action is not appended into URL then rootAction runs.
# The rootAction is default set to 'index' but can be changed using Routing::setRootAction method.


# Setting root action
$path = $path == '' ? 'index' : $path;

# Get actions:


Routing::get('index', DefaultController::class, 'index');
Routing::get('cart', DefaultController::class, 'cart');
Routing::get('settings', DefaultController::class, 'settings');
Routing::get('upload', DefaultController::class, 'upload');

Routing::get('dashboard', DashboardController::class, 'dashboard');
Routing::get('avatar', AvatarController::class, 'getAvatar');
Routing::get('login', DefaultController::class, 'login');
Routing::get('register', DefaultController::class, 'register');


Routing::post('login', LoginController::class, 'login');
//Routing::post('register', RegisterController::class, 'register');
Routing::post('give', ItemController::class, 'getItem');



# Uploads user avatar.
Routing::post('avatar', DashboardController::class, 'upload_avatar');


# Runs appropriate controller from ./controllers
Routing::run($path, $method);


