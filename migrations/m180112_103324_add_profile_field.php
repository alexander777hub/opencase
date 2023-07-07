<?php

//use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180112_103324_add_credit_photo
 */
class m180112_103324_add_profile_field extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('{{%profile}}', 'photo', $this->string()->null());
        $this->addColumn('{{%profile}}', 'credit', $this->decimal(10,2)->notNull());
        $this->addColumn('{{%profile}}', 'city_id', $this->integer()->notNull()->defaultValue(1));
        $this->addColumn('{{%profile}}', 'sex', $this->tinyInteger()->notNull()->unsigned()->defaultValue(1));
        $this->addColumn('{{%profile}}', 'birthday', $this->date()->notNull()->defaultValue('1990-01-01'));
        $this->addColumn('{{%profile}}', 'vk_link', $this->string()->null());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('{{%profile}}', 'photo');
        $this->dropColumn('{{%profile}}', 'credit');
        $this->dropColumn('{{%profile}}', 'city_id');
        $this->dropColumn('{{%profile}}', 'sex');
        $this->dropColumn('{{%profile}}', 'birthday');
        $this->dropColumn('{{%profile}}', 'vk_link');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180112_103324_add_credit_photo cannot be reverted.\n";

        return false;
    }
    */
}
