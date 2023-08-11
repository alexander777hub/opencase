<?php

use yii\db\Migration;

/**
 * Class m230811_004056_add_column_is_sold
 */
class m230811_004056_add_column_is_sold extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%opening_item}}', 'is_sold', $this->tinyInteger(1)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%opening_item}}', 'is_sold');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230811_004056_add_column_is_sold cannot be reverted.\n";

        return false;
    }
    */
}
