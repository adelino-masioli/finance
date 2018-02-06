<?php
/**
 *  Created by PhpStorm.
 *  User: Junior Ferreira
 *  Project: Sistema Financeiro HotMilhas
 */

use Phinx\Migration\AbstractMigration;

class CreateReceivesTable extends AbstractMigration
{
    public function up()
    {
        $this->table('receives')
            ->addColumn('date_launch','date')
            ->addColumn('name','string')
            ->addColumn('value','float')
            ->addColumn('status','integer')
            ->addColumn('user_id','integer')
            ->addColumn('created_at','datetime')
            ->addColumn('updated_at','datetime')
            ->addForeignKey('user_id','users','id')
            ->save();
    }

    public function down()
    {
        $this->dropTable('receives');
    }
}
