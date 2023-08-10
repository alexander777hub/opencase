<?php

use yii\db\Migration;

/**
 * Class m230810_142746_add_is_gold_column
 */
class m230810_142746_add_is_gold_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%item}}', 'is_gold', $this->tinyInteger(1)->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('{{%item}}', 'is_gold');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230810_142746_add_is_gold_column cannot be reverted.\n";

        return false;
    }
    */
}
