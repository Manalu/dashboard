<?php

require_once 'vendor/autoload.php';

error_reporting(E_ALL);
set_error_handler('Base\Error::errorHandler');
set_exception_handler('Base\Error::exceptionHandler');

$routes = Config\Main::ROUTES;
App\Router::run($routes);
