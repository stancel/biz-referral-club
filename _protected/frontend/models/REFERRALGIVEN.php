<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "REFERRAL_GIVEN".
 *
 * @property integer $GIVEN_ID
 * @property integer $MEMBER_ID
 * @property integer $REFERRAL_ID
 * @property string $GIVEN_YOUR_CARD
 * @property string $TOLD_THEM_YOU_WOULD_CALL
 * @property string $COMMENTS
 * @property integer $MEETING_ID
 *
 * @property MEMBERS $mEMBER
 * @property REFERRALS $rEFERRAL
 * @property MEETINGS $mEETING
 */
class REFERRALGIVEN extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'REFERRAL_GIVEN';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MEMBER_ID', 'REFERRAL_ID', 'MEETING_ID'], 'required'],
            [['MEMBER_ID', 'REFERRAL_ID', 'MEETING_ID'], 'integer'],
            [['GIVEN_YOUR_CARD', 'TOLD_THEM_YOU_WOULD_CALL', 'COMMENTS'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GIVEN_ID' => 'Given  ID',
            'MEMBER_ID' => 'Member  ID',
            'REFERRAL_ID' => 'Referral  ID',
            'referralName' =>Yii::t('app', 'Referral Name'),
            'GIVEN_YOUR_CARD' => 'Given  Your  Card',
            'TOLD_THEM_YOU_WOULD_CALL' => 'Told  Them  You  Would  Call',
            'COMMENTS' => 'Comments',
            'MEETING_ID' => 'Meeting  ID',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMEETING()
    {
        return $this->hasOne(MEETINGS::className(), ['MEETING_ID' => 'MEETING_ID']);
    }
    
    /**
     * Added by Brad to return referral's name in the Referral Given Index/Summary View
     * @return string
     */
    public function getReferralName() {
        return $this->rEFERRAL->REFERRAL_NAME;
    }
    
    
    public function getMemberName() {
        return $this->mEMBER->FIRST_NAME.' '.$this->mEMBER->LAST_NAME;
    }
    
}
