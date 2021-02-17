<?php

use Core\Router;

// Подключаем запросы
require_once "Request.php";

// Вспомагательные классы
require_once "../classes/Images.php";

// Подключаем роуты
require_once "../config/routes.php";

require_once "Router.php";
$router = new Router($routes);
$router->run();
