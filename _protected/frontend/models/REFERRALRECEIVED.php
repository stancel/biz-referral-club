<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "REFERRAL_RECEIVED".
 *
 * @property integer $RECEIVED_ID
 * @property integer $MEMBER_ID
 * @property integer $REFERRAL_ID
 * @property string $COMMENTS
 *
 * @property MEMBERS $mEMBER
 * @property REFERRALS $rEFERRAL
 */
class REFERRALRECEIVED extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'REFERRAL_RECEIVED';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MEMBER_ID', 'REFERRAL_ID'], 'required'],
            [['MEMBER_ID', 'REFERRAL_ID'], 'integer'],
            [['COMMENTS'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'RECEIVED_ID' => 'Received  ID',
            'MEMBER_ID' => 'Member  ID',
            'REFERRAL_ID' => 'Referral  ID',
            'COMMENTS' => 'Comments',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMEMBER()
    {
        return $this->hasOne(MEMBERS::className(), ['MEMBER_ID' => 'MEMBER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getREFERRAL()
    {
        return $this->hasOne(REFERRALS::className(), ['REFERRAL_ID' => 'REFERRAL_ID']);
    }
}
