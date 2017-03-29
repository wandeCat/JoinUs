<?php
// 企业处理投递的简历
namespace frontend\controllers;
use app\models\YiiDeliver;
use frontend\ours\PublicController;
use Yii;
use yii\helpers\Url;
use yii\db\Query;

class DeliverController extends PublicController
{
	public $company_name;
	// 显示待处理简历
	public function actionHandle()
	{
		$company_id=$this->user['id'];	
		$query= new Query;
		// 公司名称
		$this->company_name=$query  ->select("company_name")->from('yii_company_info')->where(['AND',['company_id'=>$company_id]])->one();
		// print_r($this->company_name);die;	
		$ddata=	$query  ->select("*")
						->from("yii_deliver")
                		->innerJoin("yii_resume","yii_deliver.deliver_resume_id=yii_resume.resume_id")
                		->where(['AND',['deliver_del'=>1],['deliver_status'=>0],['deliver_company_id'=>$company_id]])
                		->all();
;
		
		return $this->render('handle.html',['ddata'=>$ddata,'company_name'=>$this->company_name['company_name']]);
	}
	// 显示待定简历
	public function actionHandling()
	{
		$company_id=$this->user['id'];	
		$query= new Query;
		// 公司名称
		$this->company_name=$query  ->select("company_name")->from('yii_company_info')->where(['AND',['company_id'=>$company_id]])->one();
		// print_r($this->company_name);die;	
		$ddata=	$query  ->select("*")
						->from("yii_deliver")
                		->innerJoin("yii_resume","yii_deliver.deliver_resume_id=yii_resume.resume_id")
                		->where(['AND',['deliver_del'=>1],['deliver_status'=>1],['deliver_company_id'=>$company_id]])
                		->all();
;
		
		return $this->render('handling.html',['ddata'=>$ddata,'company_name'=>$this->company_name['company_name']]);
		
	}
	//显示已通知面试简历
	public function actionHandlgre()
	{
		$company_id=$this->user['id'];	
		$query= new Query;
		// 公司名称
		$this->company_name=$query  ->select("company_name")->from('yii_company_info')->where(['AND',['company_id'=>$company_id]])->one();
		// print_r($this->company_name);die;	
		$ddata=	$query  ->select("*")
						->from("yii_deliver")
                		->innerJoin("yii_resume","yii_deliver.deliver_resume_id=yii_resume.resume_id")
                		->where(['AND',['deliver_del'=>1],['deliver_status'=>2],['deliver_company_id'=>$company_id]])
                		->all();
;
		
		return $this->render('handlgre.html',['ddata'=>$ddata,'company_name'=>$this->company_name['company_name']]);
	}
	// 显示不合适简历
	public function actionHandlref()
	{
		$company_id=$this->user['id'];	
		$query= new Query;
		// 公司名称
		$this->company_name=$query  ->select("company_name")->from('yii_company_info')->where(['AND',['company_id'=>$company_id]])->one();
		// print_r($this->company_name);die;	
		$ddata=	$query  ->select("*")
						->from("yii_deliver")
                		->innerJoin("yii_resume","yii_deliver.deliver_resume_id=yii_resume.resume_id")
                		->where(['AND',['deliver_del'=>1],['deliver_status'=>3],['deliver_company_id'=>$company_id]])
                		->all();

		
		return $this->render('handlref.html',['ddata'=>$ddata,'company_name'=>$this->company_name['company_name']]);
	}
	//删除简历
	public function actionDel()
	{
		$deliver_id=yii::$app->request->get('deliver_id');
		$res=YiiDeliver::updateALL(['deliver_del'=>0],'deliver_id=:deliver_id',[':deliver_id'=>$deliver_id]);
		return $this->redirect(['handle']);
	}
	//通知面试简历
	public function actionGre()
	{
		$deliver_id=yii::$app->request->get('deliver_id');
		$res=YiiDeliver::updateALL(['deliver_status'=>2],'deliver_id=:deliver_id',[':deliver_id'=>$deliver_id]);
		return $this->redirect(['handle']);
	}
	//不合适简历
	public function actionRef()
	{
		$deliver_id=yii::$app->request->get('deliver_id');
		$res=YiiDeliver::updateALL(['deliver_status'=>3],'deliver_id=:deliver_id',[':deliver_id'=>$deliver_id]);
		return $this->redirect(['handle']);

	}
	//待定简历
	public function actionIng()
	{
		$deliver_id=yii::$app->request->get('deliver_id');
		$res=YiiDeliver::updateALL(['deliver_status'=>1],'deliver_id=:deliver_id',[':deliver_id'=>$deliver_id]);
		return $this->redirect(['handle']);
	}
	// 添加简历投递记录
	public function actionAdd()
	{
		$model= new YiiDeliver;
		$data=yii::$app->request->get();
		$data['deliver_time']=time();
		array_splice($data,0,1);
		// print_r($data);die;
		$model->setAttributes($data); 
		if($model->save())
		{
			echo "<script>alert('投递成功');location.href='".Url::to(['job/infoposition']).'&job_id='.$data['deliver_job_id']."'</script>";
		}
		else
		{
			echo "<script>alert('投递失败');location.href='".Url::to(['job/infoposition']).'&job_id='.$data['deliver_job_id']."'</script>";
		}
		// return $this->redirect(['job/infoposition','job_id'=>$data['deliver_job_id']]);
		
	}
	

}