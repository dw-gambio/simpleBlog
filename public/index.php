<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Application;
use App\Core\Container;

ini_set('display_errors', '1');
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
@date_default_timezone_set('Europe/Berlin');



Application::main(new Container());