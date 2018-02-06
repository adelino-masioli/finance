<?php
/**
 *  Created by PhpStorm.
 *  User: Junior Ferreira
 *  Project: Sistema Financeiro HotMilhas
 */

use Phinx\Seed\AbstractSeed;

class CategorySeeder extends AbstractSeed
{
    public function run()
    {
        $Category = $this->table('categories');
        $Category->insert([
            [
                'name'        => 'Telefone',
                'description' => 'Categoria de lançamento de telefone',
                'user_id'     => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name'        => 'Supermercado',
                'description' => 'Categoria de lançamento de supermercado',
                'user_id'     => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name'        => 'Água',
                'description' => 'Categoria de lançamento de água',
                'user_id'     => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name'        => 'Luz',
                'description' => 'Categoria de lançamento de luz',
                'user_id'     => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ]
        ])->save();
    }
}
