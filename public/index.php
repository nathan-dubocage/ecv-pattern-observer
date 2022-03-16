<?php

declare(strict_types=1);

session_start();

use App\Observers\EventManager;

spl_autoload_register(function ($fqcn) {
    $path = str_replace('\\', '/', $fqcn);
    require_once(__DIR__ . '/../' . $path . '.php');
});

define('APP_ENV', 'prod');

$router = App\Routing\Router::getFromGlobals();
$observer = new EventManager();
$observer->dispatch('isConnected', $router);
$observer->dispatch('isAdmin', $router);
$router->getController();
