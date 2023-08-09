<?php

use yii\db\Migration;

/**
 * Class m230809_101334_add_column_oi
 */
class m230809_101334_add_column_oi extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%market_order}}', 'oi_id', $this->integer(11)->null());


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%market_order}}', 'oi_id');
        return true;
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230809_101334_add_column_oi cannot be reverted.\n";

        return false;
    }
    */
}
