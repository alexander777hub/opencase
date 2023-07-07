<?php

use yii\db\Migration;

/**
 * Class m220701_044005_add_json
 */
class m220701_044005_add_json extends Migration
{
    public function safeUp()
    {
        $this->alterColumn( '{{%userform}}', 'target', $this->json());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn( '{{%userform}}', 'target', $this->integer());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220701_044005_add_json cannot be reverted.\n";

        return false;
    }
    */
}
