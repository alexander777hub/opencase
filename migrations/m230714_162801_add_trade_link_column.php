<?php

use yii\db\Migration;

/**
 * Class m230714_162801_add_trade_link_column
 */
class m230714_162801_add_trade_link_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%profile}}', 'trade_link', $this->string()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%profile}}', 'trade_link');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230714_162801_add_trade_link_column cannot be reverted.\n";

        return false;
    }
    */
}
