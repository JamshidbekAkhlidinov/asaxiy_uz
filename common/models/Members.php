<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "members".
 *
 * @property int $id
 * @property int|null $status_id
 * @property string|null $name
 * @property string|null $family_name
 * @property string|null $address
 * @property string|null $country_of_origin
 * @property string|null $email_adress
 * @property string|null $phone_number
 * @property int|null $age
 * @property int|null $hired
 *
 * @property Status $status
 */
class Members extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'members';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_id', 'age', 'hired'], 'integer'],
            [['name', 'family_name', 'address', 'country_of_origin', 'email_adress', 'phone_number'], 'string', 'max' => 255],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
        
            [['name', 'family_name'],'string','min' => 5],
            ['address','string','min' => 5],

            ['email_adress','email'],

            ['phone_number', 'match', 'pattern' => '/\+[9][9][8][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/'],


            [['name', 'family_name', 'address', 'country_of_origin', 'email_adress', 'phone_number','age', 'hired'], 'required'],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_id' => 'Status ID',
            'name' => 'Ism',
            'family_name' => 'Familiya',
            'address' => 'Manzil',
            'country_of_origin' => 'Davlat',
            'email_adress' => 'Email manzili',
            'phone_number' => 'Telefon raqami',
            'age' => 'Yoshi',
            'hired' => 'Ishlaganman',
        ];
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }
}
