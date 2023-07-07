<?php

use yii\db\Migration;

/**
 * Class m220622_105901_create
 */
class m220622_105901_create_city_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%ad}}', 'city_id', $this->integer(10)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%ad}}', 'city_id');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220622_105901_create cannot be reverted.\n";

        return false;
    }
    */
}
