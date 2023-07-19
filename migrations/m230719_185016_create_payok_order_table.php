<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payok_order}}`.
 */
class m230719_185016_create_payok_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payok_order}}', [
            'payment' => $this->primaryKey(36),
            'shop'        => $this->integer(11)->notNull(),
            'status'        => $this->integer(1)->notNull()->defaultValue(0),
           // 'payment' =>  $this->integer(36).' NOT NULL AUTO_INCREMENT',
            'method' => $this->string(2)->notNull()->defaultValue('CD'),
            'currency' => $this->string(4)->notNull()->defaultValue('RUB'),
            'email' => $this->string(255)->notNull(),
            'desc' => $this->string(255)->notNull(),
            'amount'  =>  $this->decimal(5, 2)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%payok_order}}');
        return true;
    }
}
