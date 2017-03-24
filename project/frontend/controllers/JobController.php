<?php
// 企业发布职位
namespace frontend\controllers;
use yii\web\Controller;
use Yii;
use app\models\YiiJob;
class JobController extends Controller
{
	//显示发布职位页面
	public function actionCreate()
	{
		setcookie('person_id',1,time()+3600,'/');
		$model= new YiiJob();
		
		if($data=yii::$app->request->post())
		{
			
			$dat['_csrf-frontend']=$data['_csrf-frontend'];
			array_splice($data,0,1);
			$data['job_addtime']=time();
			$dat['YiiJob']=$data;
			if($model->load($dat)&&$model->save());
			{
				return $this->redirect(['position']);
			}
			
		}
		else
		{
			return $this->renderPartial('create.html',['model'=>$model]);
		}
		
	} 
	//展示发布的有效职位
	public function actionPosition()
	{
		$company_id=$_COOKIE['person_id'];
		$jdata=YiiJob::find()->where(['AND',['job_company_id'=>$company_id],['job_status'=>1]])->orderBy(['job_addtime'=>SORT_DESC])->asArray()->all();
		
		return $this->renderPartial('positions.html',['jobData'=>$jdata]);
	}
	//展示发布的无效职位
	public function actionDownposition()
	{
		$company_id=$_COOKIE['person_id'];
		$jdata=YiiJob::find()->where(['AND',['job_company_id'=>$company_id],['job_status'=>0]])->orderBy(['job_addtime'=>SORT_DESC])->asArray()->all();
		if($jdata)
		{
			return $this->renderPartial('downpositions.html',['jobData'=>$jdata]);
		}
		
	}
	//展示职位详情
	public function actionInfoposition()
	{
		$job_id=yii::$app->request->get('job_id');
		$onedata=YiiJob::find()->where(['AND',['job_id'=>$job_id]])->asArray()->one();
		if($onedata)
		{
			return $this->renderPartial('jobdetail.html',['oneData'=>$onedata]);
		}
	}
	// 刷新职位
	public function actionFresh()
	{
		$job_id=yii::$app->request->get('job_id');
		$res=YiiJob::updateALL(['job_addtime'=>time()],'job_id=:job_id',[':job_id'=>$job_id]);
		
		if($res)
		{
			return $this->redirect(['position']);
		}
	}
	// 下线
	public function actionDown()
	{
		$job_id=yii::$app->request->get('job_id');
		$res=YiiJob::updateALL(['job_status'=>0],'job_id=:job_id',[':job_id'=>$job_id]);
		if($res)
		{
			return $this->redirect(['position']);
		}
	}
	// 上线
	public function actionUp()
	{
		$job_id=yii::$app->request->get('job_id');
		$res=YiiJob::updateALL(['job_status'=>1],'job_id=:job_id',[':job_id'=>$job_id]);
		if($res)
		{
			return $this->redirect(['downposition']);
		}
	}
}