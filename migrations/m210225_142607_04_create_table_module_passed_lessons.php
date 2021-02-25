<?php

use yii\db\Migration;

class m210225_142607_04_create_table_module_passed_lessons extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%module_passed_lessons}}', [
            'id' => $this->primaryKey(),
            'lessons_id' => $this->integer()->notNull(),
            'date' => $this->dateTime(6)->notNull(),
            'homework' => $this->string()->notNull(),
            'theme' => $this->string()->notNull(),
            'status' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('lesson_id', '{{%module_passed_lessons}}', 'lessons_id');
        $this->addForeignKey('module_passed_lessons_ibfk_1', '{{%module_passed_lessons}}', 'lessons_id', '{{%module_lessons}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%module_passed_lessons}}');
    }
}
