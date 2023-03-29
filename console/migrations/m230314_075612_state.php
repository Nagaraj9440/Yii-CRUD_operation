<?php

use yii\db\Migration;

/**
 * Class m230314_075612_state
 */
class m230314_075612_state extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%state}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'country_id' => $this->integer(12),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230314_075612_state cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230314_075612_state cannot be reverted.\n";

        return false;
    }
    */
}
