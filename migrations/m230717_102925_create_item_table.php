<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%item}}`.
 */
class m230717_102925_create_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%item}}', [
            'id' => $this->primaryKey(),
            'appid' => $this->integer(11)->null(),
            'classid' => $this->string(255)->null(),
            'instanceid' =>  $this->string(255)->null(),
            "background_color"=> $this->string(255)->null(),
            'currency' => $this->integer(11)->notNull()->defaultValue(0),
            'icon_url' => $this->string(255)->null(),
            'icon_url_large' => $this->string(255)->null(),
            'exterior' => $this->string(255)->null(),
            'internal_name' => $this->string(255)->null(),
            'name' =>  $this->string(255)->null(),
            'market_hash_name' =>  $this->string(255)->null(),
            'type' => $this->string(255)->null(),
            'rarity' => $this->string(255)->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%item}}');
        return true;
    }
}
