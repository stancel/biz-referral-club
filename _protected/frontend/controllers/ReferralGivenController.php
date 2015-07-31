<?php

namespace frontend\controllers;

use Yii;
use frontend\models\REFERRALGIVEN;
use frontend\models\ReferralGivenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReferralGivenController implements the CRUD actions for REFERRALGIVEN model.
 */
class ReferralGivenController extends Controller
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
     * Lists all REFERRALGIVEN models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReferralGivenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single REFERRALGIVEN model.
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
     * Creates a new REFERRALGIVEN model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new REFERRALGIVEN();

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->GIVEN_ID]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
        
        
        $referralModel = new \frontend\models\REFERRALS();    
        // This is how to handle multiple models in one Controller action
        if ($model->load(Yii::$app->request->post()) && $referralModel->load(Yii::$app->request->post()) && $referralModel->save() ) {
            $referralModel->save(false);
             // skip validation as model is already validated
            // Set the PK of the dependent table (officeLocation) with the PK of the record you just inserted ($model->COMPANY_ID)
            $model->REFERRAL_ID = $referralModel->REFERRAL_ID; // no need for validation rule on Primary Key as you set it yourself
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->GIVEN_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'referralModel' => $referralModel,
            ]);
        }
        
        
    }

    /**
     * Updates an existing REFERRALGIVEN model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->GIVEN_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing REFERRALGIVEN model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the REFERRALGIVEN model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return REFERRALGIVEN the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = REFERRALGIVEN::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
