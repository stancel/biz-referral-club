<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "LEADERSHIP_ROLES".
 *
 * @property integer $LEADERSHIP_ROLE_ID
 * @property string $ROLE_NAME
 * @property string $ROLE_DESCRIPTION
 *
 * @property ROLEDATES[] $rOLEDATESs
 */
class LEADERSHIPROLES extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'LEADERSHIP_ROLES';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ROLE_NAME'], 'required'],
            [['ROLE_DESCRIPTION'], 'string'],
            [['ROLE_NAME'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LEADERSHIP_ROLE_ID' => 'Leadership  Role  ID',
            'ROLE_NAME' => 'Role  Name',
            'ROLE_DESCRIPTION' => 'Role  Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getROLEDATESs()
    {
        return $this->hasMany(ROLEDATES::className(), ['LEADERSHIP_ROLE_ID' => 'LEADERSHIP_ROLE_ID']);
    }
}
