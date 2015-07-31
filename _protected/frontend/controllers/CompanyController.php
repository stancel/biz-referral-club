<?php

namespace frontend\controllers;

use Yii;
use frontend\models\COMPANIES;
use frontend\models\OFFICELOCATIONS;


//use yii\base\Model; 

use frontend\models\CompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompanyController implements the CRUD actions for COMPANIES model.
 */
class CompanyController extends Controller
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
     * Lists all COMPANIES models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single COMPANIES model.
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
     * Creates a new COMPANIES model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
//        $model = new COMPANIES();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->COMPANY_ID]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
        
        
        $model = new COMPANIES();
        // Pull in second model
        $officeLocation = new OFFICELOCATIONS();    
        // This is how to handle multiple models in one Controller action
        if ($model->load(Yii::$app->request->post()) && $officeLocation->load(Yii::$app->request->post()) && $model->save() ) {
            $model->save(false); // skip validation as model is already validated
            // Set the PK of the dependent table (officeLocation) with the PK of the record you just inserted ($model->COMPANY_ID)
            $officeLocation->COMPANY_ID = $model->COMPANY_ID; // no need for validation rule on Primary Key as you set it yourself
            $officeLocation->save(false); 
            return $this->redirect(['view', 'id' => $model->COMPANY_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'officeLocation' => $officeLocation,
            ]);
        }

        
    }

    /**
     * Updates an existing COMPANIES model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->COMPANY_ID]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
        
        
        $model = $this->findModel($id);
        // Pull in second model
        $officeLocation = $this->findOfficeLocationModel($id);
        //$officeLocation = new OFFICELOCATIONS();    
        // This is how to handle multiple models in one Controller action
        if ($model->load(Yii::$app->request->post()) && $officeLocation->load(Yii::$app->request->post()) && $model->save() ) {
            $model->save(false); // skip validation as model is already validated
            // Set the PK of the dependent table (officeLocation) with the PK of the record you just inserted ($model->COMPANY_ID)
            $officeLocation->COMPANY_ID = $model->COMPANY_ID; // no need for validation rule on Primary Key as you set it yourself
            $officeLocation->save(false); 
            return $this->redirect(['view', 'id' => $model->COMPANY_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'officeLocation' => $officeLocation,
            ]);
        }
        
        
        
    }

    /**
     * Deletes an existing COMPANIES model.
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
     * Finds the COMPANIES model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return COMPANIES the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = COMPANIES::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findOfficeLocationModel($id)
    {
        if (($model = OFFICELOCATIONS::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    
}
