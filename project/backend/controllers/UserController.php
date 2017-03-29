<?php

namespace backend\controllers;

use Yii;
use app\models\User;
use app\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{

    public $defaultAction = 'admin';//设置默认访问Action方法admin
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderPartial('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderPartial('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderPartial('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
     public function actionAdmin()
    {
        $laout=false;
        return $this->render('admin');
    }

    public $enableCsrfValidation=false;
    public $layout=false;

    //设置登录方法
    public function actionLogin()
    {
        if($data=Yii::$app->request->post()){

            $data['password']=md5($data['password']);
            $model = new User();
            $resname = $model->getOne($data);
            $respwd = $model->getTwo($data);
            if ($resname) {
                if($respwd){
                    if (!empty($data['remember_me'])) {
                        setcookie('username',$data['username'],time()+3600*24*7);
                        return $this->redirect(array('/user/admin'));
                    }else{
                        setcookie('username',$data['username']);
                        return $this->redirect(array('/user/admin'));                    
                    }
                    
                }else{
                    echo "This pass word error";
                    die;
                }
            }else{
                echo "This user name error";
                die;
            }
            print_r($data);die;
        }else{
            return $this->renderPartial('login');
        }
    }

    //设置登出方法
    public function actionLogout()
    {
        setcookie('username','',time()-1);
        return $this->renderPartial('login');
    }
}
