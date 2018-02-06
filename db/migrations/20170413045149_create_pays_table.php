<?php
/**
 *  Created by PhpStorm.
 *  User: Junior Ferreira
 *  Project: Sistema Financeiro HotMilhas
 */

use Phinx\Migration\AbstractMigration;

class CreatePaysTable extends AbstractMigration
{
    public function up()
    {
        $this->table('pays')
            ->addColumn('date_launch','date')
            ->addColumn('name','string')
            ->addColumn('value','float')
            ->addColumn('status','integer')
            ->addColumn('user_id','integer')
            ->addColumn('category_id','integer')
            ->addForeignKey('user_id','users','id')
            ->addForeignKey('category_id','categories','id')
            ->addColumn('created_at','datetime')
            ->addColumn('updated_at','datetime')
            ->save();
    }

    public function down()
    {
        $this->dropTable('pays');
    }
}