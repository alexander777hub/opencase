<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%phone}}`.
 */
class m220718_125747_create_phone_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%phone}}', [
            'id'          => $this->primaryKey(),
            'created_at'  => $this->dateTime() . ' DEFAULT NOW()',
            'updated_at'  => $this->dateTime()->null(),
            'phone' => $this->string(100)->null(),
            'name' => $this->string(50)->null(),
            'city' => $this->string(20)->null(),
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%phone}}');
    }
}
