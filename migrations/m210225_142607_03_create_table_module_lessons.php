<?php

use yii\db\Migration;

class m210225_142607_03_create_table_module_lessons extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%module_lessons}}', [
            'id' => $this->primaryKey(),
            'lasson_name' => $this->string()->notNull(),
            'group_id' => $this->integer()->notNull(),
            'weekday' => $this->integer()->notNull(),
            'lesson_order' => $this->integer()->notNull(),
            'teacher_id' => $this->integer()->notNull(),
            'cab' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('group_id', '{{%module_lessons}}', 'group_id');
        $this->createIndex('teacher_id', '{{%module_lessons}}', 'teacher_id');
        $this->addForeignKey('module_lessons_ibfk_1', '{{%module_lessons}}', 'group_id', '{{%module_group}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('module_lessons_ibfk_2', '{{%module_lessons}}', 'teacher_id', '{{%module_users}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%module_lessons}}');
    }
}
