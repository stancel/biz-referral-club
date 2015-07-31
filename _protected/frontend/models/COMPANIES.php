<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "COMPANIES".
 *
 * @property integer $COMPANY_ID
 * @property string $COMPANY_NAME
 *
 * @property MEMBERS[] $mEMBERSs
 * @property OFFICELOCATIONS[] $oFFICELOCATIONSs
 */
class COMPANIES extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'COMPANIES';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['COMPANY_NAME'], 'required'],
            [['COMPANY_NAME'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'COMPANY_ID' => 'Company  ID',
            'COMPANY_NAME' => 'Company  Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMEMBERSs()
    {
        return $this->hasMany(MEMBERS::className(), ['COMPANY_ID' => 'COMPANY_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOFFICELOCATIONSs()
    {
        return $this->hasMany(OFFICELOCATIONS::className(), ['COMPANY_ID' => 'COMPANY_ID']);
    }
}
