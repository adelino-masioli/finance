<?php
/**
 *  Created by PhpStorm.
 *  User: Junior Ferreira
 *  Project: Sistema Financeiro HotMilhas
 */

use Psr\Http\Message\ServerRequestInterface;
use FinanceHotM\Application;
use FinanceHotM\Plugins\AuthPlugin;
use FinanceHotM\Plugins\DbPlugin;
use FinanceHotM\Plugins\RoutePlugin;
use FinanceHotM\Plugins\ViewPlugin;
use FinanceHotM\ServiceContainer;

require_once __DIR__ . '/../vendor/autoload.php';

if(file_exists(__DIR__ .'/../.env')) {
    $dotenv = new \Dotenv\Dotenv(__DIR__ . '/../');
    $dotenv->overload();
}

require_once __DIR__ . '/../src/helpers.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());

require_once __DIR__ . '/../src/controllers/statements.php';
require_once __DIR__ . '/../src/controllers/categories.php';
require_once __DIR__ . '/../src/controllers/receives.php';
require_once __DIR__ . '/../src/controllers/pays.php';
require_once __DIR__ . '/../src/controllers/users.php';
require_once __DIR__ . '/../src/controllers/auth.php';


$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

$app->start();