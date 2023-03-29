<?php

use yii\db\Migration;

/**
 * Class m230314_080104_taluk
 */
class m230314_080104_taluk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%taluk}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'country_id' => $this->integer(12),
            'state_id' => $this->integer(12),
            'district_id' => $this->integer(12),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230314_080104_taluk cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230314_080104_taluk cannot be reverted.\n";

        return false;
    }
    */
}
