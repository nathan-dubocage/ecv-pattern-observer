<?php

declare(strict_types=1);

session_start();

use App\Listeners\AdminListener;
use App\Listeners\AuthenticateListener;
use App\Observers\EventManager;

spl_autoload_register(function ($fqcn) {
    $path = str_replace('\\', '/', $fqcn);
    require_once(__DIR__ . '/../' . $path . '.php');
});

define('APP_ENV', 'prod');

$router = App\Routing\Router::getFromGlobals();

$observer = new EventManager();

$adminListener = new AdminListener();
$authenticateListener = new AuthenticateListener();

$observer->subcribe($adminListener);
$observer->subcribe($authenticateListener);

$observer->notify('AdminListener', $router);
$observer->notify('AuthenticateListener', $router);

$router->getController();
