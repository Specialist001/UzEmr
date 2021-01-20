<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%specialities}}`.
 */
class m210120_102715_create_specialities_table extends Migration
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

        $this->createTable('{{%specialities}}', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%specialities}}');
    }
}
