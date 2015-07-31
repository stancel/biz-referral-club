<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ATTENDANCE".
 *
 * @property integer $ATTENDANCE_ID
 * @property integer $MEMBER_ID
 * @property integer $MEETING_ID
 *
 * @property MEMBERS $mEMBER
 * @property MEETINGS $mEETING
 */
class ATTENDANCE extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ATTENDANCE';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MEMBER_ID', 'MEETING_ID'], 'required'],
            [['MEMBER_ID', 'MEETING_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ATTENDANCE_ID' => 'Attendance  ID',
            'MEMBER_ID' => 'Member  ID',
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
    public function getMEETING()
    {
        return $this->hasOne(MEETINGS::className(), ['MEETING_ID' => 'MEETING_ID']);
    }
}
