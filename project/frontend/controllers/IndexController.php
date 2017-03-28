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
class IndexController extends Controller{
	public $enableCsrfValidation=false;
	public $layout=false;
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

	function actionList()
	{	
		$post=yii::$app->request->post('spc');
		//echo $post;die;
		$job_wage = isset($_GET['job_wage'])?$_GET['job_wage']:"";
		//echo $job_wage;
		$arr=explode('-', $job_wage);
		//print_r($arr);die;
		$kd=yii::$app->request->post('kd');
		//等于1时是搜索用户表
	    if(yii::$app->request->post('spc')==1){
	    	
		   	if(empty($job_wage)){
		   		$query = \app\models\YiiJob::find() -> where(['like','job_name',"$kd"]);
		   	}else{
		   		$query = \app\models\YiiJob::find() -> where(['like','job_name',"$kd"])->where(['between',"$arr[0]","$arr[1]"]);
		   	}

	    }else{
			$query = \app\models\YiiCompanyInfo::find() -> where(['like','company_name',"$kd"]);
	    }

	    //数据分页
	    $pagination = new Pagination([  
            'defaultPageSize' => 5,  
            'totalCount' => $query->count(),  
        ]);  
  
        $countries = $query  
            ->offset($pagination->offset)  
            ->limit($pagination->limit)
            ->asArray()  
            ->all();  
  
        return $this->render('list.php', [
            'countries' => $countries,  
            'pagination' => $pagination,
            'post' => $post,
            'kd' => $kd,  
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
