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
            'app_id' => $this->integer(11)->notNull()->defaultValue(730),
            'class_id' => $this->integer(11)->null(),
            'currency' => $this->integer(11)->notNull()->defaultValue(0),
            'icon' => $this->string(255)->null(),
            'icon_large' => $this->string(255)->null(),
            'internal_name' => $this->string(255)->null(),
            'profile_id' => $this->integer(11)->null(),
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
