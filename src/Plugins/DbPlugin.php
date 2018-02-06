<?php
/**
 *  Created by PhpStorm.
 *  User: Junior Ferreira
 *  Project: Sistema Financeiro HotMilhas
 */

declare(strict_types=1);

namespace FinanceHotM\Plugins;

use Interop\Container\ContainerInterface;
use FinanceHotM\Models\Pay;
use FinanceHotM\Models\Receive;
use FinanceHotM\Models\Category;
use FinanceHotM\Models\User;
use FinanceHotM\Repository\CategoryRepository;
use FinanceHotM\Repository\RepositoryFactory;
use FinanceHotM\Repository\StatementRepository;
use FinanceHotM\ServiceContainerInterface;
use Illuminate\Database\Capsule\Manager as Capsule;

class DbPlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $capsule = new Capsule();
        $config = include __DIR__ . '/../../config/db.php';
        $capsule->addConnection($config['default_connection']);
        $capsule->bootEloquent();

        $container->add('repository.factory', new RepositoryFactory());
        $container->addLazy(
            'category.repository', function () {
                return new CategoryRepository();
            }
        );

        $container->addLazy(
            'receive.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(Receive::class);
            }
        );

        $container->addLazy(
            'pay.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(Pay::class);
            }
        );

        $container->addLazy(
            'user.repository', function (ContainerInterface $container) {
                return $container->get('repository.factory')->factory(User::class);
            }
        );

        $container->addLazy(
            'statement.repository', function () {
                return new StatementRepository();
            }
        );

    }
}
