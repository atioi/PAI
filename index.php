<?php

require 'Routing.php';

require_once './src/controllers/DefaultController.php';
require_once './src/controllers/Authorization/LoginController.php';
require_once './src/controllers/Authorization/RegisterController.php';
require_once './src/controllers/UserController.php';


# $_SERVER  is global variable available on server.

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);
$method = strtolower($_SERVER['REQUEST_METHOD']);

# If action is not appended into URL then rootAction runs.
# The rootAction is default set to 'index' but can be changed using Routing::setRootAction method.


# Setting root action
$path = $path == '' ? 'index' : $path;

# Get actions:

Routing::get('uploads', DefaultController::class, 'uploads');
Routing::get('dashboard', DashboardController::class, 'dashboard');
Routing::get('hello', DefaultController::class, 'hello');
Routing::get('indev', DefaultController::class, 'indec');

# Post actions:
Routing::post('login', LoginController::class, 'login');
Routing::post('register', RegisterController::class, 'register');
Routing::post('portrait', DashboardController::class, 'portrait');


# Display root page.
Routing::get('index', DefaultController::class, 'index');
# Supplies the avatar to the user.
Routing::get('avatar', UserController::class, 'getAvatar');
# Display login page.
Routing::get('login', DefaultController::class, 'login');
# Display register page.
Routing::get('register', DefaultController::class, 'register');



# Uploads user avatar.
Routing::post('avatar', DashboardController::class, 'upload_avatar');


# Runs appropriate controller from ./controllers
Routing::run($path, $method);


