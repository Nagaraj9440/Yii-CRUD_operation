<?php

use yii\db\Migration;

/**
 * Class m230314_075734_district
 */
class m230314_075734_district extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%district}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'country_id' => $this->integer(12),
            'state_id' => $this->integer(12),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230314_075734_district cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230314_075734_district cannot be reverted.\n";

        return false;
    }
    */
}
