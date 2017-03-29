<?php
//没有登录也能访问的页面网站主站
namespace frontend\controllers;
use yii\web\Controller;
use Yii;
use app\models\Trade;
use app\models\User_Person;
use app\models\YiiCompany_info;
use yii\data\Pagination; 
use app\models\Yiijob;
use app\models\JobWage;
use app\models\JobExperience;
use app\models\JobEducation;
class IndexController extends Controller{
	public $enableCsrfValidation=false;
	public $layout=false;
	//首页
    public function actionIndex(){
		//职位分类
		$trade = Trade::find()->asArray()->all();
		$data['trade']=$this->recursion($trade);
		//热门职位,限制10条
		$data['job_hot']=Yiijob::find()->where(['job_status'=>1])->orderby('job_hot desc')->asArray()->all();
		//最新职位,限制10条
		$data['job_new']=Yiijob::find()->where(['job_status'=>1])->orderby('job_addtime desc')->asArray()->all();
		/*echo "<pre>";
		print_r($data['job']);die;*/
        return $this->renderPartial('index.php',$data);
    }
	
	//搜索页面
	function actionList()
	{	
		$get=yii::$app->request->get('spc');
		//搜索条件
		$job_wage = isset($_GET['job_wage'])?$_GET['job_wage']:"";
		$job_experience = isset($_GET['job_experience'])?$_GET['job_experience']:"";
		$job_education = isset($_GET['job_education'])?$_GET['job_education']:"";

		$arr=explode('-', $job_wage);
		$kd=yii::$app->request->get('kd');
		
		//薪资
		$wage=\app\models\JobWage::find()->asarray()->all();
		//经验
		$experience=\app\models\JobExperience::find()->asarray()->all();
		//学历
		$education=\app\models\JobEducation::find()->asarray()->all();

		//等于1时是搜索用户表
	    if(yii::$app->request->get('spc')==1){
		   	if(empty($job_wage)){
				$arr=['like','job_name',"$kd"];
		   		//$query = \app\models\YiiJob::find() -> where(['like','job_name',"$kd"]);
		   	}else{
				$arr=['and',['like','job_name',"$kd"],['between','job_wage',"$arr[0]","$arr[1]"]];
		   		//$query = \app\models\YiiJob::find() -> where(['and',['like','job_name',"$kd"],['between','job_wage',"$arr[0]","$arr[1]"]]);
		   	}

			$query = \app\models\YiiJob::find() -> where($arr);
	    }else{
			$query = \app\models\YiiCompanyInfo::find() -> where(['like','company_name',"$kd"]);
	    }

	    //数据分页
	    $pagination = new Pagination([  
            'defaultPageSize' => 5,  
            'totalCount' => $query->count(),  
        ]);
		//$url = '&id=1&action=search';
		$pagination->route = 'index/list';
        $countries = $query  
            ->offset($pagination->offset)  
            ->limit($pagination->limit)
            ->asArray()  
            ->all();  
  
        return $this->render('list.php', [
            'countries' => $countries,  
            'pagination' => $pagination,
            'post' => $get,
            'kd' => $kd,

			'job_wage'=>$job_wage,
			'job_experience'=>$job_experience,
			'job_education'=>$job_education,
			
			'wage'=>$wage,
			'experience'=>$experience,
			'education'=>$education,
        ]); 
        //print_r($countries);die;

	   
	  
	   
	}

    //递归
	function recursion($data,$i=0)
	{	$arr=array();
		foreach($data as $key=>$val)
		{
			if($val['trade_pid']==$i)
			{
				$val['son']=$this->recursion($data,$val['trade_id']);
				$arr[]=$val;
			}
		}
		return $arr;
	}

}
