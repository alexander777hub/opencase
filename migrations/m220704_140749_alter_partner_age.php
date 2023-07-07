<?php

use yii\db\Migration;

/**
 * Class m220704_140749_alter_partner_age
 */
class m220704_140749_alter_partner_age extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%userform}}', 'partner_age');
        $this->addColumn('{{%userform}}', 'partner_age_min', $this->integer(2)->null());
        $this->addColumn('{{%userform}}', 'partner_age_max', $this->integer(2)->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%userform}}', 'partner_age_min');
        $this->dropColumn('{{%userform}}', 'partner_age_max');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220704_140749_alter_partner_age cannot be reverted.\n";

        return false;
    }
    */
}
