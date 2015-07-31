<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "MEMBERS".
 *
 * @property integer $MEMBER_ID
 * @property string $FIRST_NAME
 * @property string $LAST_NAME
 * @property string $PHONE_NUMBER
 * @property string $POSITION
 * @property string $IS_ACTIVE
 * @property string $EMAIL_ADDRESS
 * @property string $PASSWORD
 * @property string $JOINED_DATE
 * @property string $LEFT_DATE
 * @property integer $COMPANY_ID
 * @property string $IMAGE_FILENAME_ON_SERVER
 * @property string $IMAGE_FILENAME_FROM_USER
 *
 * @property ATTENDANCE[] $aTTENDANCEs
 * @property COMPANIES $cOMPANY
 * @property REFERRALGIVEN[] $rEFERRALGIVENs
 * @property REFERRALRECEIVED[] $rEFERRALRECEIVEDs
 * @property ROLEDATES[] $rOLEDATESs
 */
class MEMBERS extends \yii\db\ActiveRecord
{

    public $image;
    
    
        /**
     * fetch stored image file name with complete path 
     * @return string
     */
    public function getImageFile() 
    {
        //return isset($this->IMAGE_FILENAME_ON_SERVER) ? Yii::$app->params['uploadPath'] . $this->IMAGE_FILENAME_ON_SERVER : null;
        return isset($this->IMAGE_FILENAME_ON_SERVER) ? Yii::getAlias('@webroot').'/uploads/'.$this->IMAGE_FILENAME_ON_SERVER : null; 
        
    }

    /**
     * fetch stored image url
     * @return string
     */
    public function getImageUrl() 
    {
        // return a default image placeholder if your source avatar is not found
        $IMAGE_FILENAME_ON_SERVER = isset($this->IMAGE_FILENAME_ON_SERVER) ? $this->IMAGE_FILENAME_ON_SERVER : 'default_user.jpg';
        return Yii::$app->params['uploadUrl'] . $IMAGE_FILENAME_ON_SERVER;
    }

    /**
    * Process upload of image
    *
    * @return mixed the uploaded image instance
    */
    public function uploadImage() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $image = UploadedFile::getInstance($this, 'image');
        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }
        // store the source file name
        $this->IMAGE_FILENAME_FROM_USER = $image->name;
        $ext = end((explode(".", $image->name)));
        // generate a unique file name
        $this->IMAGE_FILENAME_ON_SERVER = Yii::$app->security->generateRandomString().".{$ext}";
        // the uploaded image instance
        return $image;
    }

    /**
    * Process deletion of image
    *
    * @return boolean the status of deletion
    */
    public function deleteImage() {
        $file = $this->getImageFile();
        // check if file exists on server
        if (empty($file) || !file_exists($file)) {
            return false;
        }
        // check if uploaded file can be deleted on server
        if (!unlink($file)) {
            return false;
        }
        // if deletion successful, reset your file attributes
        $this->IMAGE_FILENAME_ON_SERVER = null;
        $this->IMAGE_FILENAME_FROM_USER = null;

        return true;
    }
    
    
    
    
    
    
    
    
    
    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MEMBERS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FIRST_NAME', 'LAST_NAME', 'PHONE_NUMBER', 'POSITION', 'IS_ACTIVE', 'EMAIL_ADDRESS', 'PASSWORD', 'JOINED_DATE', 'COMPANY_ID'], 'required'],
            [['IS_ACTIVE'], 'string'],
            [['JOINED_DATE', 'LEFT_DATE', 'image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['COMPANY_ID'], 'integer'],
            [['FIRST_NAME', 'LAST_NAME', 'PHONE_NUMBER', 'POSITION', 'EMAIL_ADDRESS', 'IMAGE_FILENAME_ON_SERVER', 'IMAGE_FILENAME_FROM_USER'], 'string', 'max' => 45],
            [['PASSWORD'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MEMBER_ID' => 'Member  ID',
            'FIRST_NAME' => 'First  Name',
            'LAST_NAME' => 'Last  Name',
            'PHONE_NUMBER' => 'Phone  Number',
            'POSITION' => 'Position',
            'IS_ACTIVE' => 'Is  Active',
            'EMAIL_ADDRESS' => 'Email  Address',
            'PASSWORD' => 'Password',
            'JOINED_DATE' => 'Joined  Date',
            'LEFT_DATE' => 'Left  Date',
            'COMPANY_ID' => 'Company  ID',
            'IMAGE_FILENAME_ON_SERVER' => 'Image  Filename  On  Server',
            'IMAGE_FILENAME_FROM_USER' => 'Image  Filename  From  User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getATTENDANCEs()
    {
        return $this->hasMany(ATTENDANCE::className(), ['MEMBER_ID' => 'MEMBER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCOMPANY()
    {
        return $this->hasOne(COMPANIES::className(), ['COMPANY_ID' => 'COMPANY_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getREFERRALGIVENs()
    {
        return $this->hasMany(REFERRALGIVEN::className(), ['MEMBER_ID' => 'MEMBER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getREFERRALRECEIVEDs()
    {
        return $this->hasMany(REFERRALRECEIVED::className(), ['MEMBER_ID' => 'MEMBER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getROLEDATESs()
    {
        return $this->hasMany(ROLEDATES::className(), ['MEMBER_ID' => 'MEMBER_ID']);
    }
}
