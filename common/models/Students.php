<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property int|null $phone
 * @property string|null $address
 * @property int|null $standard_id
 * @property int|null $country_id
 * @property int|null $state_id
 * @property int|null $district_id
 * @property int|null $taluk_id
 */
class Students extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['phone', 'standard_id', 'country_id', 'state_id', 'district_id', 'taluk_id'], 'integer'],
            [['address'], 'string'],
            [['name', 'email'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['phone'], 'unique'],
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
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'standard_id' => 'Standard ID',
            'country_id' => 'Country ID',
            'state_id' => 'State ID',
            'district_id' => 'District ID',
            'taluk_id' => 'Taluk ID',
        ];
    }


  /**
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery|DistrictQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'district_id']);
    }

    /**
     * Gets query for [[Schoolclass]].
     *
     * @return \yii\db\ActiveQuery|StudentQuery
     */
    public function getStandard()
    {
        return $this->hasOne(Standard::className(), ['id' => 'standard_id']);
    }

    /**
     * Gets query for [[State]].
     *
     * @return \yii\db\ActiveQuery|StateQuery
     */
    public function getState()
    {
        return $this->hasOne(State::className(), ['id' => 'state_id']);
    }

    /**
     * Gets query for [[Taluk]].
     *
     * @return \yii\db\ActiveQuery|TalukQuery
     */
    public function getTaluk()
    {
        return $this->hasOne(Taluk::className(), ['id' => 'taluk_id']);
    }
     /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery|CountryQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }
    public static function getStateList($count_id)
    {
     $state=State::find()
     ->select(['id','name'])
     ->where(['country_id'=> $count_id])
     ->asArray()
     ->all();
 return $state;
 }
 public static function getDistrictList($dist_id)
    {
     $district=District::find()
     ->select(['id','name'])
     ->where(['state_id'=> $dist_id])
     ->asArray()
     ->all();
 return $district;
    }
    public static function getTalukList($tuk_id)
    {
     $taluk=Taluk::find()
     ->select(['id','name'])
     ->where(['district_id'=> $tuk_id])
     ->asArray()
     ->all();
 return $taluk;
    }
}