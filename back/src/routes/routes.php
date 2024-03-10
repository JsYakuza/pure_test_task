<?php

use App\Controllers\MessagesController;
use App\Controllers\ThemeController;
use App\Router;

$router = new Router();

$router->get('^\/themes$', ['controller' => ThemeController::class, 'method' => 'index']);
$router->get('^\/themes\/\d$', ['controller' => ThemeController::class, 'method' => 'show']);
$router->post('^\/messages$', ['controller' => MessagesController::class, 'method' => 'create']);

return $router;
