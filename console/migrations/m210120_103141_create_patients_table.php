<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%patients}}`.
 */
class m210120_103141_create_patients_table extends Migration
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

        $this->createTable('{{%patients}}', [
            'id' => $this->bigPrimaryKey()->unsigned(),
            'user_id' => $this->bigInteger()->unsigned()->notNull(),
            'first_name' => $this->string(100),
            'middle_name' => $this->string(100),
            'last_name' => $this->string(100),
            'status' => $this->smallInteger(2)->notNull()->defaultValue(0),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%patients}}');
    }
}
