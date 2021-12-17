<?php

require 'Routing.php';
require_once './src/controllers/DefaultController.php';


# $_SERVER  is global variable available on server.
$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', "DefaultController");
Routing::get('login', "DefaultController");

# Runs appropriate controller from ./controllers
Routing::run($path);


