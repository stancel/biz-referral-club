<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use frontend\models\MEETINGS;

/**
 * This is the model class for table "MEETINGS".
 *
 * @property integer $MEETING_ID
 * @property string $MEETING_PLACE
 * @property integer $DATE_AND_TIME
 * @property integer $CREATED_TIME
 * @property integer $LAST_UPDATED_TIME
 *
 * @property ATTENDANCE[] $aTTENDANCEs
 * @property REFERRALGIVEN[] $rEFERRALGIVENs
 */
class MEETINGS extends \yii\db\ActiveRecord
{
    
    // BRAD - This method can deal with Foreign Key Restraints
    // examples - cascading delete or helping return error message
    public function beforeDelete()
    {
        // This is how to check Foreign Keys to see if there are records tied to other tables
        // If no conflicting records then excute parent:beforeDelete to
        if ( empty($this->getATTENDANCEs()->all()) && empty($this->getREFERRALGIVENs()->all()) ) {
            parent::beforeDelete();
            return true;
        }
        else {
            return false;
        }
    }
    
    
    public function convertDate($date) 
    {
         //$savedDate = date_create_from_format("MM-dd-yyyy HH:mm", $date);
         return date("m-d-Y g:i a", $date);
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'CREATED_TIME',
                'updatedAtAttribute' => 'LAST_UPDATED_TIME',
                //'value' => new Expression('NOW()'),  // Date format 
                //'value' => new Expression('UNIX_TIMESTAMP(NOW())'),  // Unix timestamp from Mysql
                'value' => function(){return time();}, // Unix timestamp from php
            ],
        ];
    }
    
    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MEETINGS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MEETING_PLACE', 'DATE_AND_TIME'], 'required'],
            [['DATE_AND_TIME','CREATED_TIME','LAST_UPDATED_TIME'], 'safe'],
            //[['DATE_AND_TIME'], 'integer'],
            [['MEETING_PLACE'], 'string', 'max' => 75]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MEETING_ID' => 'Meeting  ID',
            'MEETING_PLACE' => 'Meeting  Place',
            'DATE_AND_TIME' => 'Date  And  Time',
            'CREATED_TIME' => 'Created Time',
            'LAST_UPDATED_TIME' => 'Last Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getATTENDANCEs()
    {
        return $this->hasMany(ATTENDANCE::className(), ['MEETING_ID' => 'MEETING_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getREFERRALGIVENs()
    {
        return $this->hasMany(REFERRALGIVEN::className(), ['MEETING_ID' => 'MEETING_ID']);
    }
}
