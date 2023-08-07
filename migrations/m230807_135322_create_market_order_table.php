<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%market_order}}`.
 */
class m230807_135322_create_market_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%market_order}}', [
            'id' => $this->primaryKey(),
            'item_id'         => $this->integer(11)->notNull(),
            'custom_id' => $this->string(255)->null(),
            'price'  =>  $this->integer(11)->null(),
            'user_id' => $this->integer(11)->notNull(),
            'status' => $this->integer(11)->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%market_order}}');
        return true;
    }
}
