<?php

use HiLsAger\MMF\classes\Application;

require_once(__DIR__.'/inc.php');

define('BASE_PATH', __DIR__);
define('BASE_PATH_CONTROLLERS', __DIR__ . './controllers');
define('BASE_PATH_CLASSES', __DIR__ . './classes');
define('BASE_PATH_VIEWS', __DIR__ . './views');
define('BASE_PATH_LANGUAGES', __DIR__ . './languages');
define('BASE_PATH_MODELS', __DIR__ . './models');

$app = new Application();
$app->begin();
