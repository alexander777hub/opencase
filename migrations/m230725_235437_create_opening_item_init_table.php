<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%opening_item_init}}`.
 */
class m230725_235437_create_opening_item_init_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%opening_item_init}}', [
            'id' => $this->primaryKey(),
            'case_id'        => $this->integer(11)->notNull(),
            'item_id'         => $this->integer(11)->notNull(),
            'price'  =>  $this->decimal(13, 4)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%opening_item_init}}');
        return true;
    }
}
