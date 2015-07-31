<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "REFERRALS".
 *
 * @property integer $REFERRAL_ID
 * @property string $REFERRAL_NAME
 * @property string $ADDRESS
 * @property string $CITY
 * @property string $STATE
 * @property string $ZIP
 * @property string $EMAIL
 * @property string $PHONE
 * @property string $COMMENTS
 *
 * @property REFERRALGIVEN[] $rEFERRALGIVENs
 * @property REFERRALRECEIVED[] $rEFERRALRECEIVEDs
 */
class REFERRALS extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'REFERRALS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['REFERRAL_NAME'], 'required'],
            [['COMMENTS'], 'string'],
            [['REFERRAL_NAME', 'ADDRESS'], 'string', 'max' => 60],
            [['CITY', 'STATE', 'ZIP', 'EMAIL', 'PHONE'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'REFERRAL_ID' => 'Referral  ID',
            'REFERRAL_NAME' => 'Referral  Name',
            'ADDRESS' => 'Address',
            'CITY' => 'City',
            'STATE' => 'State',
            'ZIP' => 'Zip',
            'EMAIL' => 'Email',
            'PHONE' => 'Phone',
            'COMMENTS' => 'Comments',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getREFERRALGIVENs()
    {
        return $this->hasMany(REFERRALGIVEN::className(), ['REFERRAL_ID' => 'REFERRAL_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getREFERRALRECEIVEDs()
    {
        return $this->hasMany(REFERRALRECEIVED::className(), ['REFERRAL_ID' => 'REFERRAL_ID']);
    }
}
