<?php

use yii\db\Migration;

class m210225_142607_02_create_table_module_users extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%module_users}}', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer()->notNull(),
            'FIO' => $this->string()->notNull(),
            'mail' => $this->string()->notNull(),
            'role' => $this->integer()->notNull(),
            'login' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createIndex('group_id', '{{%module_users}}', 'group_id');
        $this->addForeignKey('module_users_ibfk_1', '{{%module_users}}', 'group_id', '{{%module_group}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%module_users}}');
    }
}
