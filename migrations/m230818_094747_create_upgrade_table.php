<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%upgrade}}`.
 */
class m230818_094747_create_upgrade_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%upgrade}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'item_id' =>  $this->integer(11)->notNull(),
            'price' =>    $this->decimal(13, 4)->null(),
            'status' =>  $this->tinyInteger(1)->notNull()->defaultValue(0)

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%upgrade}}');
        return true;
    }
}
