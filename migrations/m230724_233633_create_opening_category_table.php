<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%opening_category}}`.
 */
class m230724_233633_create_opening_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%opening_category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%opening_category}}');
        return true;
    }
}
