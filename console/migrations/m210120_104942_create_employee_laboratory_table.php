<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee_laboratory}}`.
 */
class m210120_104942_create_employee_laboratory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%employee_laboratory}}', [
            'id' => $this->bigPrimaryKey()->unsigned(),
            'laboratory_id' => $this->bigInteger()->unsigned()->notNull(),
            'employee_id' => $this->bigInteger()->unsigned()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employee_laboratory}}');
    }
}
