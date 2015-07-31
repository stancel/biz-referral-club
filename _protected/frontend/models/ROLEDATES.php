<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ROLE_DATES".
 *
 * @property integer $ROLE_DATE_ID
 * @property string $START_DATE
 * @property string $END_DATE
 * @property integer $MEMBER_ID
 * @property integer $LEADERSHIP_ROLE_ID
 *
 * @property MEMBERS $mEMBER
 * @property LEADERSHIPROLES $lEADERSHIPROLE
 */
class ROLEDATES extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ROLE_DATES';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['START_DATE', 'END_DATE', 'MEMBER_ID', 'LEADERSHIP_ROLE_ID'], 'required'],
            [['START_DATE', 'END_DATE'], 'safe'],
            [['MEMBER_ID', 'LEADERSHIP_ROLE_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ROLE_DATE_ID' => 'Role  Date  ID',
            'START_DATE' => 'Start  Date',
            'END_DATE' => 'End  Date',
            'MEMBER_ID' => 'Member  ID',
            'LEADERSHIP_ROLE_ID' => 'Leadership  Role  ID',
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
    public function getLEADERSHIPROLE()
    {
        return $this->hasOne(LEADERSHIPROLES::className(), ['LEADERSHIP_ROLE_ID' => 'LEADERSHIP_ROLE_ID']);
    }
}
