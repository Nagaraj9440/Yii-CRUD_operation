<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "taluk".
 *
 * @property int $id
 * @property string $name
 * @property int|null $country_id
 * @property int|null $state_id
 * @property int|null $district_id
 */
class Taluk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'taluk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['country_id', 'state_id', 'district_id'], 'integer'],
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
            'district_id' => 'District ID',
        ];
    }
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['taluk_id' => 'id']);
    }
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }
    public function getState()
    {
        return $this->hasOne(State::className(), ['id' => 'state_id']);
    }
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'district_id']);
    }
}
