<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%laboratory_lab_type}}`.
 */
class m210120_104841_create_laboratory_lab_type_table extends Migration
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

        $this->createTable('{{%laboratory_lab_type}}', [
            'id' => $this->bigPrimaryKey()->unsigned(),
            'laboratory_id' => $this->bigInteger()->unsigned()->notNull(),
            'lab_type_id' => $this->bigInteger()->unsigned()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%laboratory_lab_type}}');
    }
}
