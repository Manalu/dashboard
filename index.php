<?php

require_once 'vendor/autoload.php';

use Config\Main as Config;
use Base\Router;

error_reporting(Config::ERRORS_LEVEL);
set_error_handler(Config::ERROR_HANDLER);
set_exception_handler(Config::EXCEPTION_HANDLER);

Router::run(Config::class);
