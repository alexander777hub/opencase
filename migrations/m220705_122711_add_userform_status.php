<?php

use yii\db\Migration;

/**
 * Class m220705_122711_add_userform_status
 */
class m220705_122711_add_userform_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%userform}}', 'status', $this->integer(1)->unsigned()->notNull()->defaultValue(0));
        $this->createIndex(
            'idx-userform-vk_link',
            'userform',
            'vk_link'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('userform', 'status');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220705_122711_add_userform_status cannot be reverted.\n";

        return false;
    }
    */
}
