<?php

use yii\db\Migration;

/**
 * Class m230728_011853_add_column_price
 */
class m230728_011853_add_column_price extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%item}}', 'price', $this->decimal(13, 4)->null());


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%item}}', 'price');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230728_011853_add_column_price cannot be reverted.\n";

        return false;
    }
    */
}
