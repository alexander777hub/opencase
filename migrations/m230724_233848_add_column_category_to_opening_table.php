<?php

use yii\db\Migration;

/**
 * Class m230724_233848_add_column_category_to_opening_table
 */
class m230724_233848_add_column_category_to_opening_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%opening}}', 'category_id', $this->integer(11)->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%opening}}', 'category_id');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230724_233848_add_column_category_to_opening_table cannot be reverted.\n";

        return false;
    }
    */
}
