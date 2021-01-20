<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%analyzes}}`.
 */
class m210120_105851_create_analyzes_table extends Migration
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

        $this->createTable('{{%analyzes}}', [
            'id' => $this->bigPrimaryKey()->unsigned(),
            'reception_id' => $this->bigInteger()->unsigned()->null(),
            'laboratory_id' => $this->bigInteger()->unsigned()->null(),
            'employee_id' => $this->bigInteger()->unsigned()->notNull(),
            'lab_type_id' => $this->bigInteger()->unsigned()->notNull(),
            'patient_id' => $this->bigInteger()->unsigned()->notNull(),
            'description' => $this->text(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%analyzes}}');
    }
}
