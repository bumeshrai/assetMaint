<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "manufacturer".
 *
 * @property integer $manuf_id
 * @property integer $ename_id
 * @property string $name
 * @property string $country
 * @property string $contact_person
 * @property string $contact_phone
 * @property string $contact_email
 *
 * @property EquipmentName $ename
 */
class Manufacturer extends \yii\db\ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manufacturer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ename_id', 'name'], 'required'],
            [['ename_id'], 'integer'],
            [['name', 'country', 'contact_person'], 'string', 'max' => 50],
            [['contact_phone'], 'string', 'max' => 20],
            [['contact_email'], 'string', 'max' => 30],
            [['ename_id'], 'exist', 'skipOnError' => true, 'targetClass' => EquipmentName::className(), 'targetAttribute' => ['ename_id' => 'ename_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'manuf_id' => 'Manuf ID',
            'ename_id' => 'Select Equipment',
            'name' => 'Manufacturer Name',
            'country' => 'Country',
            'contact_person' => 'Contact Person',
            'contact_phone' => 'Contact Phone',
            'contact_email' => 'Contact Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment_name()
    {
        return $this->hasOne(EquipmentName::className(), ['ename_id' => 'ename_id']);
    }
}
