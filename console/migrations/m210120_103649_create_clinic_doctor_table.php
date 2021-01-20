<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%clinic_doctor}}`.
 */
class m210120_103649_create_clinic_doctor_table extends Migration
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

        $this->createTable('{{%clinic_doctor}}', [
            'id' => $this->bigPrimaryKey()->unsigned(),
            'clinic_id' => $this->bigInteger()->unsigned()->notNull(),
            'doctor_id' => $this->bigInteger()->unsigned()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%clinic_doctor}}');
    }
}
