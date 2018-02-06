<?php
/**
 *  Created by PhpStorm.
 *  User: Junior Ferreira
 *  Project: Sistema Financeiro HotMilhas
 */

use FinanceHotM\Application;
use FinanceHotM\Plugins\AuthPlugin;
use FinanceHotM\Plugins\DbPlugin;
use FinanceHotM\ServiceContainer;

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());

return $app;