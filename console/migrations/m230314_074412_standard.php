<?php

use yii\db\Migration;

/**
 * Class m230314_074412_standard
 */
class m230314_074412_standard extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%standard}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230314_074412_standard cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230314_074412_standard cannot be reverted.\n";

        return false;
    }
    */
}
