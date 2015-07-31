<?php

namespace frontend\controllers;

use Yii;
use frontend\models\MEMBERS;
use frontend\models\MemberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//Used to make pretty URLs for Routing
//use yii\helpers\Url;
use yii\web\UploadedFile;


//$url = Url::to(['member/index']);

/**
 * MemberController implements the CRUD actions for MEMBERS model.
 */
class MemberController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all MEMBERS models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MemberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MEMBERS model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MEMBERS model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MEMBERS();
        
        if ($model->load(Yii::$app->request->post()) ) {            
            //Call model's uploadImage method
            $image = $model->uploadImage();
            // Save the data to the DB and save the image onto specified path 
            if($model->save()){
                // upload only if valid uploaded file instance found
                if ($image !== false) {
                    $path = $model->getImageFile();
                    $image->saveAs($path);
                }
                return $this->redirect(['view', 'id'=>$model->MEMBER_ID]);
            } else {
                // error in saving model
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MEMBERS model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldFile = $model->getImageFile();
        $oldIMAGE_FILENAME_ON_SERVER = $model->IMAGE_FILENAME_ON_SERVER;
        $oldIMAGE_FILENAME_FROM_USER = $model->IMAGE_FILENAME_FROM_USER;
                
        if ( $model->load(Yii::$app->request->post()) ) {
            // process uploaded image file instance
            $image = $model->uploadImage();
 
            // revert back if no valid file instance uploaded
            if ($image === false) {
                $model->IMAGE_FILENAME_ON_SERVER = $oldIMAGE_FILENAME_ON_SERVER;
                $model->IMAGE_FILENAME_FROM_USER = $oldIMAGE_FILENAME_FROM_USER;
            }
 
            if ($model->save()) {
                // upload only if valid uploaded file instance found
                if ($image !== false && file_exists($oldFile) ) { // delete old and overwrite
                    unlink($oldFile);
                    $path = $model->getImageFile();
                    $image->saveAs($path);
                }
                if ($image !== false ) { // delete old and overwrite
                    $path = $model->getImageFile();
                    $image->saveAs($path);
                }
                return $this->redirect(['view', 'id'=>$model->MEMBER_ID]);
            } else {
                // error in saving model
            }
        }
        else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }      
    }

    /**
     * Deletes an existing MEMBERS model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
        
        $model = $this->findModel($id);

        // validate deletion and on failure process any exception
        // e.g. display an error message
        if ($model->delete()) {
            if (!$model->deleteImage()) {
                Yii::$app->session->setFlash('error', 'Error deleting image');
            }
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the MEMBERS model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MEMBERS the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MEMBERS::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
//    function actionShowmodal(){
//        $js='$("#modal").modal("show")';
//        $this->getView()->registerJs($js);        
//        return $this->render('index');
//    }
}
