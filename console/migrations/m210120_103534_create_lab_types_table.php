<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lab_types}}`.
 */
class m210120_103534_create_lab_types_table extends Migration
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

        $this->createTable('{{%lab_types}}', [
            'id' => $this->bigPrimaryKey()->unsigned(),
            'name' => $this->string(),
            'type' => $this->string(50)
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lab_types}}');
    }
}
