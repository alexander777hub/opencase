<?php

use yii\db\Migration;

/**
 * Class m230714_103656_add_avatar_full_to_profile
 */
class m230714_103656_add_avatar_full_to_profile extends Migration
{


    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%profile}}', 'photo_full', $this->string()->null());
        $this->addColumn('{{%profile}}', 'visibility', $this->tinyInteger(1)->null());
        $this->addColumn('{{%profile}}', 'status',  $this->tinyInteger(1)->notNull()->defaultValue(0));

    }



    public function down()
    {
        $this->dropColumn('{{%profile}}', 'photo_full');
        $this->dropColumn('{{%profile}}', 'visibility');
        $this->dropColumn('{{%profile}}', 'status');
        return true;
    }


}
