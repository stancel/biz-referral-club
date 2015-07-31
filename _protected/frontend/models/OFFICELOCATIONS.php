<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "OFFICE_LOCATIONS".
 *
 * @property integer $OFFICE_LOCATION_ID
 * @property string $STREET_ADDRESS
 * @property string $CITY
 * @property string $STATE
 * @property string $ZIP
 * @property string $PHONE
 * @property string $FAX
 * @property string $BRANCH_NUMBER
 * @property integer $COMPANY_ID
 *
 * @property COMPANIES $cOMPANY
 */
class OFFICELOCATIONS extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'OFFICE_LOCATIONS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STREET_ADDRESS', 'CITY', 'STATE', 'ZIP', 'PHONE', 'COMPANY_ID'], 'required'],
            [['COMPANY_ID'], 'integer'],
            [['STREET_ADDRESS', 'CITY', 'STATE', 'ZIP', 'PHONE', 'FAX', 'BRANCH_NUMBER'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'OFFICE_LOCATION_ID' => 'Office  Location  ID',
            'STREET_ADDRESS' => 'Street  Address',
            'CITY' => 'City',
            'STATE' => 'State',
            'ZIP' => 'Zip',
            'PHONE' => 'Phone',
            'FAX' => 'Fax',
            'BRANCH_NUMBER' => 'Branch  Number',
            'COMPANY_ID' => 'Choose a Company',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCOMPANY()
    {
        return $this->hasOne(COMPANIES::className(), ['COMPANY_ID' => 'COMPANY_ID']);
    }
}
