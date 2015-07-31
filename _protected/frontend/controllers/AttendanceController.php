<?php

namespace frontend\controllers;

use Yii;
use frontend\models\ATTENDANCE;
use frontend\models\AttendanceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AttendanceController implements the CRUD actions for ATTENDANCE model.
 */
class AttendanceController extends Controller
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
     * Lists all ATTENDANCE models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AttendanceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ATTENDANCE model.
     * @param integer $ATTENDANCE_ID
     * @param integer $MEMBER_ID
     * @return mixed
     */
    public function actionView($ATTENDANCE_ID, $MEMBER_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ATTENDANCE_ID, $MEMBER_ID),
        ]);
    }

    /**
     * Creates a new ATTENDANCE model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ATTENDANCE();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ATTENDANCE_ID' => $model->ATTENDANCE_ID, 'MEMBER_ID' => $model->MEMBER_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ATTENDANCE model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ATTENDANCE_ID
     * @param integer $MEMBER_ID
     * @return mixed
     */
    public function actionUpdate($ATTENDANCE_ID, $MEMBER_ID)
    {
        $model = $this->findModel($ATTENDANCE_ID, $MEMBER_ID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ATTENDANCE_ID' => $model->ATTENDANCE_ID, 'MEMBER_ID' => $model->MEMBER_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ATTENDANCE model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ATTENDANCE_ID
     * @param integer $MEMBER_ID
     * @return mixed
     */
    public function actionDelete($ATTENDANCE_ID, $MEMBER_ID)
    {
        $this->findModel($ATTENDANCE_ID, $MEMBER_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ATTENDANCE model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ATTENDANCE_ID
     * @param integer $MEMBER_ID
     * @return ATTENDANCE the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ATTENDANCE_ID, $MEMBER_ID)
    {
        if (($model = ATTENDANCE::findOne(['ATTENDANCE_ID' => $ATTENDANCE_ID, 'MEMBER_ID' => $MEMBER_ID])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
