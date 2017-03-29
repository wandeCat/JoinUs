<?php

namespace backend\controllers;

use Yii;
use app\models\Advert;
use app\models\UploadForm;
use app\models\search\AdvertSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\base\Model;
use yii\data\ActiveDataProvider;
/**
 * AdvertController implements the CRUD actions for Advert model.
 */
class AdvertController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Advert models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdvertSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderPartial('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Advert model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->renderPartial('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Advert model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Advert();

        $upload_model = new UploadForm();

        $post = Yii::$app->request->post();
        if (Yii::$app->request->isPost) {
           $upload_model->file = \yii\web\UploadedFile::getInstance($upload_model, 'file');
            if ($upload_model->file && $upload_model->validate()) {
                $filename ='uploads/' . $upload_model->file->baseName . '.' . $upload_model->file->extension;
                $upload_model->file->saveAs($filename);
                $post['Advert']['file']=$filename;
            }
        }

        if ($model->load($post) && $model->save()) 
        {
            return $this->redirect(['view', 'id' => $model->advert_id]);
        }else{
            return $this->renderPartial('create', [
                'model' => $model,
                'upload_model'=> $upload_model,
            ]);
        }
    }

//测试上传
    public function actionUpload()
    {
        $model = new \app\models\UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = \yii\web\UploadedFile::getInstance($model, 'file');
            if ($model->file && $model->validate()) {
                $filename ='uploads/' . $model->file->baseName . '.' . $model->file->extension;
                $model->file->saveAs($filename);
                          
            }
        }  
        return $this->render('upload', ['model' => $model]);
    }

    /**
     * Updates an existing Advert model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->advert_id]);
        } else {
            return $this->renderPartial('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Advert model.
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
     * Finds the Advert model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advert the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Advert::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
