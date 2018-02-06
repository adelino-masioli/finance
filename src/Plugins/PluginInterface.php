<?php
/**
 *  Created by PhpStorm.
 *  User: Junior Ferreira
 *  Project: Sistema Financeiro HotMilhas
 */

namespace FinanceHotM\Plugins;

use FinanceHotM\ServiceContainerInterface;

interface PluginInterface
{
    public function register(ServiceContainerInterface $container);
}