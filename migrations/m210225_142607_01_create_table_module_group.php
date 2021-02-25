<?php

use yii\db\Migration;

class m210225_142607_01_create_table_module_group extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%module_group}}', [
            'id' => $this->primaryKey(),
            'number' => $this->string()->notNull(),
            'spec' => $this->string()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%module_group}}');
    }
}
