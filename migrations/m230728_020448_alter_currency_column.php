<?php

use yii\db\Migration;

/**
 * Class m230728_020448_alter_currency_column
 */
class m230728_020448_alter_currency_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%item}}', 'currency', $this->string(255)->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('{{%item}}', 'currency', $this->integer(11)->notNull()->defaultValue(0));
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230728_020448_alter_currency_column cannot be reverted.\n";

        return false;
    }
    */
}
