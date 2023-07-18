<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%opening}}`.
 */
class m230717_201835_add_price_column_to_opening_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%opening}}', 'price', $this->decimal(5, 2)->notNull()->defaultValue(0.00));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%opening}}', 'price');
        return true;
    }
}
