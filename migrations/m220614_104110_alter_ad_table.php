<?php

use yii\db\Migration;

/**
 * Class m220614_104110_alter_ad_table
 */
class m220614_104110_alter_ad_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('ad', 'description', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220614_104110_alter_ad_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220614_104110_alter_ad_table cannot be reverted.\n";

        return false;
    }
    */
}
