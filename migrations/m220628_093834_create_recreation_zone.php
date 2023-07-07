<?php

use yii\db\Migration;

/**
 * Class m220628_093834_create_recreation_zone
 */
class m220628_093834_create_recreation_zone extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%recreation_zone}}', [
            'id'          => $this->primaryKey(),
            'type'        => $this->integer(1)->unsigned()->notNull()->defaultValue(1),
            'description' => $this->string(1000)->null(),
            'title' => $this->string(20)->notNull(),
            'phones' =>  $this->string(255)->null(),
            'adress' =>  $this->string(255)->null(),
            'city_id'        => $this->integer(10)->unsigned()->notNull()->defaultValue(1),
            'site' => $this->string(20)->notNull(),
            'vk_link' => $this->string(20)->notNull(),
            'comment' => $this->string(1000)->null(),
            'photo' => $this->integer(10)->null()->defaultValue(null),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%recreation_zone}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220628_093834_create_recreation_zone cannot be reverted.\n";

        return false;
    }
    */
}
