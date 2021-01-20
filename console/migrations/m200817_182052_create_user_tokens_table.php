<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_tokens}}`.
 */
class m200817_182052_create_user_tokens_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_tokens}}', [
            'id' => $this->bigPrimaryKey(),
            'user_id' => $this->bigInteger()->notNull(),
            'token' => $this->string(32),
            'expired' => $this->integer(11),
            'created_at' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_tokens}}');
    }
}
