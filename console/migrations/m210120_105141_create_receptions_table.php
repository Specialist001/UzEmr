<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%receptions}}`.
 */
class m210120_105141_create_receptions_table extends Migration
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

        $this->createTable('{{%receptions}}', [
            'id' => $this->bigPrimaryKey()->unsigned(),
            'clinic_id' => $this->bigInteger()->unsigned()->notNull(),
            'patient_id' => $this->bigInteger()->unsigned()->notNull(),
            'doctor_id' => $this->bigInteger()->unsigned()->notNull(),
            'employee_id' => $this->bigInteger()->unsigned()->notNull(),
            'laboratory_id' => $this->bigInteger()->unsigned()->null(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%receptions}}');
    }
}
