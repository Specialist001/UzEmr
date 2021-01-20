<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%doctors}}`.
 */
class m210120_102829_create_doctors_table extends Migration
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

        $this->createTable('{{%doctors}}', [
            'id' => $this->bigPrimaryKey()->unsigned(),
            'user_id' => $this->bigInteger()->unsigned()->unique()->notNull(),
            'speciality_id' => $this->bigInteger()->unsigned(),
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
        $this->dropTable('{{%doctors}}');
    }
}
