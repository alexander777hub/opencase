<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m230729_065313_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id'          => $this->primaryKey()->notNull(),
            'created_at'  => $this->dateTime() . ' DEFAULT NOW()',
            'frequency' => $this->integer(2)->unsigned()->notNull(),
            'repeat_count' => $this->integer(2)->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task}}');
    }
}
