<?php

use yii\db\Migration;

/**
 * Class m230314_075328_students
 */
class m230314_075328_students extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%students}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'email' => $this->string(),
            'phone' => $this->integer(11)->unique(),
            'address' => $this->text(),
            'standard_id' => $this->integer(12),
            'country_id' => $this->integer(12),
            'state_id' => $this->integer(12),
            'district_id' => $this->integer(12),
            'taluk_id' => $this->integer(12),
            'student_image' => $this->string(),
           
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230314_075328_students cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230314_075328_students cannot be reverted.\n";

        return false;
    }
    */
}
