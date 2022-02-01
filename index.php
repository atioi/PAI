<?php
require_once 'Routing.php';
require_once 'src/controllers/ItemController.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);
$path = explode('/', $path);

$action = $path[0] == '' ? 'index' : $path[0];

//
//$ic = new ItemController();
//$ic->items(30);

// Views:
Routing::get('index', 'ViewsController');
Routing::get('login', 'ViewsController');
Routing::get('dashboard', 'ViewsController');
Routing::get('upload', 'ViewsController');
Routing::get('cart', 'ViewsController');
Routing::get('register', 'ViewsController');
Routing::get('settings', 'ViewsController');
Routing::get('logout', 'LoginController');
Routing::get('items', 'ItemController');


// Actions:
Routing::post('login', 'LoginController');
Routing::post('register', 'RegisterController');



Routing::run($action);
