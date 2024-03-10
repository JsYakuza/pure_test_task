<?php

require_once __DIR__.'/vendor/autoload.php';

use App\Helper;
use App\Kernel;
use App\Request;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

error_reporting(E_ALL);
ini_set('display_errors', 'on');
header('Content-Type: application/json; charset=utf-8');

try {
    $router = require __DIR__.'/src/routes/routes.php';
    $request = new Request(
        $_SERVER['REQUEST_METHOD'],
        $_SERVER['REQUEST_URI'],
        Helper::convertRequestBody(file_get_contents('php://input')),
        Helper::convertQueryString($_SERVER['REQUEST_URI'])
    );
    $app = new Kernel($router, $request);
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}
