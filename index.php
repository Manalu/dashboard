<?php

require_once 'vendor/autoload.php';

use Config\Main as Config;

error_reporting(Config::ERRORS_LEVEL);
set_error_handler(Config::ERROR_HANDLER);
set_exception_handler(Config::EXCEPTION_HANDLER);

Base\Router::run(Config::class);
