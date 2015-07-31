<?php

namespace frontend\controllers;

use Yii;
use frontend\models\MEETINGS;
use frontend\models\MeetingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MeetingController implements the CRUD actions for MEETINGS model.
 */
class MeetingController extends Controller
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
     * Lists all MEETINGS models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MeetingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MEETINGS model.
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
     * Creates a new MEETINGS model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MEETINGS();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MEETING_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MEETINGS model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MEETING_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MEETINGS model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
//        $this->findModel($id)->delete();
//        return $this->redirect(['index']);

        
        
        try {          
            // This needs a custom beforeDelete() in the Model
            if ( $this->findModel($id)->delete() ) {
//            $this->findModel($id)->de
                return $this->redirect(['index']);
            }
            else {
                //throw new NotFoundHttpException('This meeting has referrals already tied to it and cannot be deleted.');
//                throw new \yii\db\IntegrityException('This meeting has referrals already tied to it and cannot be deleted.');
//                throw new \yii\base\NotSupportedException('This meeting has referrals already tied to it and cannot be deleted.');
                //throw new \yii\base\UserException('This meeting has referrals already tied to it and cannot be deleted.'); //This is good!
//                throw new \yii\base\ErrorException('This meeting has referrals already tied to it and cannot be deleted.'); 
                Yii::$app->getSession()->setFlash('error', 'This meeting has referrals already tied to it and cannot be deleted.');
                return $this->redirect(['index']);
            }
        }
        catch(db\IntegrityException $e) {
            throw new \yii\base\NotSupportedException('This meeting has referrals already tied to it and cannot be deleted.');
        }
        
    }

    /**
     * Finds the MEETINGS model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MEETINGS the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MEETINGS::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
