<?php
/**
 *  Created by PhpStorm.
 *  User: Junior Ferreira
 *  Project: Sistema Financeiro HotMilhas
 */

use Phinx\Migration\AbstractMigration;

class CreateCategoriesTable extends AbstractMigration
{
    public function up()
    {
        $this->table('categories')
            ->addColumn('name', 'string')
            ->addColumn('description', 'string')
            ->addColumn('user_id','integer')
            ->addForeignKey('user_id','users','id')
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->save();
    }

    public function down()
    {
        $this->dropTable('categories');
    }
}