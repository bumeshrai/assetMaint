<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sms_recipient".
 *
 * @property integer $sms_id
 * @property integer $ename_id
 * @property string $mobile
 * @property string $email
 *
 * @property EquipmentName $ename
 */
class SmsRecipient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sms_recipient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ename_id', 'mobile'], 'required'],
            [['ename_id'], 'integer'],
            [['mobile'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 255],
            [['ename_id'], 'exist', 'skipOnError' => true, 'targetClass' => EquipmentName::className(), 'targetAttribute' => ['ename_id' => 'ename_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sms_id' => 'Sms ID',
            'ename_id' => 'Ename ID',
            'mobile' => 'Mobile',
            'email' => 'Email',
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
