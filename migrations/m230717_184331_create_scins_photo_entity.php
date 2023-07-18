<?php

use yii\db\Migration;

/**
 * Class m230717_184331_create_scins_photo_entity
 */
class m230717_184331_create_scins_photo_entity extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%item_photo_entity}}', [
            'id' => $this->primaryKey(),
            'bind_obj_id'      => $this->integer(10)->notNull(),
            'created_at'  => $this->dateTime() . ' DEFAULT NOW()',
            'updated_at'  => $this->dateTime()->null(),
            'description' => $this->text()->null(),
            'title' => $this->string(20)->null(),
            'url' => $this->string(255)->null(),
            'type'        => $this->integer(1)->unsigned()->notNull()->defaultValue(1),
        ], $tableOptions);

        $this->createIndex('photo_idx', 'item_photo_entity', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%item_photo_entity}}');
        return true;
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230717_184331_create_scins_photo_entity cannot be reverted.\n";

        return false;
    }
    */
}
