<?php

use yii\db\Migration;

class m210225_142607_05_create_table_module_aditional_info extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%module_aditional_info}}', [
            'id' => $this->primaryKey(),
            'passed_lessons_id' => $this->integer()->notNull(),
            'student_id' => $this->integer()->notNull(),
            'comment' => $this->string()->notNull(),
            'mark' => $this->integer()->notNull()->defaultValue('0'),
        ], $tableOptions);

        $this->createIndex('passed_lessons_id', '{{%module_aditional_info}}', 'passed_lessons_id');
        $this->createIndex('student_id', '{{%module_aditional_info}}', 'student_id');
        $this->addForeignKey('module_aditional_info_ibfk_1', '{{%module_aditional_info}}', 'passed_lessons_id', '{{%module_passed_lessons}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('module_aditional_info_ibfk_2', '{{%module_aditional_info}}', 'student_id', '{{%module_users}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%module_aditional_info}}');
    }
}
