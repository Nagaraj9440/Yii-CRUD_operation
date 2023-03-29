<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property int $id
 * @property string $name
 * @property int|null $country_id
 * @property int|null $state_id
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['country_id', 'state_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'country_id' => 'Country ID',
            'state_id' => 'State ID',
        ];
    }
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['state_id' => 'id']);
    }
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }
    public function getState()
    {
        return $this->hasOne(State::className(), ['id' => 'state_id']);
    }

}
