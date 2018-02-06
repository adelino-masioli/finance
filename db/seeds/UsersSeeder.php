<?php
/**
 *  Created by PhpStorm.
 *  User: Junior Ferreira
 *  Project: Sistema Financeiro HotMilhas
 */

use Phinx\Seed\AbstractSeed;

class UsersSeeder extends AbstractSeed
{
    public function run()
    {
        /** @var \FinanceHotM\Application $app */
        $app = require __DIR__ . '/../bootstrap.php';
        $auth = $app->service('auth');

        $Category = $this->table('users');
        $Category->insert([
            [
                'first_name' => 'Administrador',
                'last_name'  => 'ADMIN',
                'email'      => 'admin@admin.com',
                'password'   => $auth->hashPassword('123456'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'first_name'  => 'Junior',
                'last_name'   => 'Ferreira',
                'email'       => 'alfjuniorbh.web@gmail.com',
                'password'    => $auth->hashPassword('123456'),
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ]
        ])->save();
    }
}
