<?php
// 企业发布职位
namespace frontend\controllers;
use app\models\YiiJob;
use frontend\ours\PublicController;
use Yii;
use yii\db\Query;
class JobController extends PublicController
{
	//显示发布职位页面
	public function actionCreate()
	{
		
		$model= new YiiJob();
		if($data=yii::$app->request->post())
		{
			$dat['_csrf-frontend']=$data['_csrf-frontend'];
			array_splice($data,0,1);
			$data['job_addtime']=time();
			$data['job_contents']=nl2br($data['job_contents']);
			$dat['YiiJob']=$data;
			if($model->load($dat)&&$model->save());
			{
				return $this->redirect(['position']);
			}
			
		}
		else
		{
			return $this->render('create.html',['model'=>$model]);
		}
		
	} 
	//展示发布的有效职位
	public function actionPosition()
	{
		$company_id=$this->user['id'];
		$jdata=YiiJob::find()->where(['AND',['job_company_id'=>$company_id],['job_status'=>1]])->orderBy(['job_addtime'=>SORT_DESC])->asArray()->all();
		
		return $this->render('positions.html',['jobData'=>$jdata]);
	}
	//展示发布的无效职位
	public function actionDownposition()
	{
		$company_id=$this->user['id'];
		$jdata=YiiJob::find()->where(['AND',['job_company_id'=>$company_id],['job_status'=>0]])->orderBy(['job_addtime'=>SORT_DESC])->asArray()->all();
		return $this->render('downpositions.html',['jobData'=>$jdata]);
		
		
	}
	//展示职位详情
	public function actionInfoposition()
	{
		$query= new Query;
		// 获取简历ID
		if(isset($this->user['id']))
		{
			$id=$this->user['id'];
			$resumeid=	$query ->select('resume_id')
								->from('yii_resume')
								->where(['AND',['person_id'=>$id],['resume_acquiesce'=>1]])
								->one();
								
			$resume_id=$resumeid['resume_id'];
		}
		else
		{
			$id=$this->user['id'];
			$resume_id=0;
		}
		$job_id=yii::$app->request->get('job_id');
		// 查看是否投过简历
		$result=$query ->select('deliver_id')
								->from('yii_deliver')
								->where(['AND',['deliver_resume_id'=>$resume_id],['deliver_job_id'=>$job_id]])
								->one();
		if($result)
		{
			$res=1;
		}
		else
		{
			$res=0;
		}
		
		
		$onedata=YiiJob::find()->where(['AND',['job_id'=>$job_id]])->asArray()->one();
		if($onedata)
		{
			return $this->render('jobdetail.html',['oneData'=>$onedata,'resume_id'=>$resume_id,'res'=>$res]);
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