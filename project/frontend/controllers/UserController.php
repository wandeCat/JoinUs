<?php
//用户登录注册页面分企业用户和个人用户
namespace frontend\controllers;

use yii\web\Controller;
use Yii;
use app\models\User_Person;
use app\models\User_Company;

class UserController extends Controller{

	public $enableCsrfValidation=false;
	public $layout=false;

    /*
    	登录
     */
    public function actionLogin(){
        $cookies = Yii::$app->request->cookies;
        $user=$cookies->getValue('user');
        if(!isset($user)){
        	/*
        		判断提交方式为post方式
        	 */
        	if($data=Yii::$app->request->post()){
        		/*
        			登录密码采用md5加密
        		 */
        		$data['password']=md5($data['password']);
        		/*
        			实例化个人model
        		 */
        		$model = new \app\models\User_Person();
        		/*
        			调用个人model查询方法
        		 */
        		$cout1 = $model->getOne1($data);
        		$cout2 = $model->getOne2($data);
        		$cout3 = $model->getOne3($data);
        		$cout4 = $model->getOne4($data);
        		/*
        			判断用户名是否存在
        		 */
        		if($cout1||$cout2){
        			/*
        				用户名存在，进一步判断密码是否正确
        			 */
        			if($cout3['person_password']==$data['password']||$cout4['company_password']==$data['password']){
        				/*
        					登录成功存cookie并跳转到网站首页
        				 */
        				if(empty($cout3)){
        					$user = serialize($cout4);
        				}else{
        					$user = serialize($cout3);
        				}
        				$cookies = Yii::$app->response->cookies;
        				/*
        					判断记住密码复选框是否选中，进而设置cookie类型和过期时间
        				 */
        				if(isset($data['autoLogin'])){
    						$cookies->add(new \yii\web\Cookie([
    						    'name' => 'user',
    						    'value' => $user,
    						    'expire'=>time()+3600*24*7
    						]));
        				}else{
        					$cookies->add(new \yii\web\Cookie([
    						    'name' => 'user',
    						    'value' => $user
    						]));
        				}
                        $data="登录成功";
                        $action='index/index';
        				//return $this->redirect(array('/index/index'));
                        return $this->actionSkip($data,$action);
        			}else{
        				$data="密码错误";
                        $action='user/login';
                        return $this->actionSkip($data,$action);
        			}
        		}else{
        			$data="用户名不存在";
                    $action='user/login';
                    return $this->actionSkip($data.$action);
        		}
    		/*
    			判断提交方式为get方式
    		 */
        	}else{
        		return $this->renderPartial('login.php');
        	}
        }else{
            $data="您已登录";
            $action='index/index';
            return $this->actionSkip($data,$action);
        }
    }

    /*
    	注册
     */
    public function actionRegister(){
    	/*
    		判断提交方式为post方式
    	 */
    	if($data=Yii::$app->request->post()){
    		/*
    			密码进行md5加密
    		 */
    		$data['password']=md5($data['password']);
    		/*
    			判断单选框为个人用户
    		 */
    		if($data['type']==0){
    			/*
    				实例化个人model
    			 */
    			$model = new \app\models\User_Person();
    			/*
    				调用个人model查询方法
    			 */
    			$cout1 = $model->getOne1($data);
    			$cout2 = $model->getOne2($data);
    			/*
    				判断用户名是否存在
    			 */
    			if($cout1||$cout2){
    				$data="用户名已存在";
                    $action='user/register';
                    return $this->actionSkip($data,$action);
    			}else{
    				/*
    					调用个人model添加方法
    				 */
    				$result=$model->create($data);
    				/*
    					判断注册成功与否
    				 */
	    			if($result){
	    				/*
	    					注册成功存cookie并跳转详细信息页
	    				 */
                        $data="注册个人用户成功";
                        $action='index/index';
	    				return $this->actionSkip($data,$action);
	    			}else{
	    				$data="注册失败";
                        $action='user/register';
                        return $this->actionSkip($data,$action);
	    			}
    			}	
    		/*
    			判断单选框为企业用户
    		 */
    		}else{
    			/*
    				实例化企业model
    			 */
    			$model = new \app\models\User_Company();
    			/*
    				调用企业model查询方法
    			 */
    			$cout1 = $model->getOne1($data);
    			$cout2 = $model->getOne2($data);
    			/*
    				判断用户名是否存在
    			 */
    			if($cout1||$cout2){
    				$data="用户名已存在";
                    $action='user/register';
                    return $this->actionSkip($data,$action);
    			}else{
    				/*
    					调用企业model添加方法
    				 */
    				$result=$model->create($data);
    				/*
    					判断注册成功与否
    				 */
                    $user = serialize($data);
	    			if($result){
                        $cookies = Yii::$app->response->cookies;
                        $cookies->add(new \yii\web\Cookie([
                            'name' => 'user',
                            'value' => $user
                        ]));
                        $data="注册企业用户成功";
                        $action='index/index';
	    				return $this->actionSkip($data,$action);
	    			}else{
	    				$data="注册失败";
                        $action='user/register';
                        return $this->actionSkip($data,$action);
	    			}
    			}
    		}
    	}else{
    		return $this->renderPartial('register.php');
    	}       
    }

    public function actionReset(){
        if($data=Yii::$app->request->post()){
            //print_r($data);die;
            $model = new \app\models\User_Person();
            if(isset($data['email'])){
                $cout1 = $model->getOne1($data);
                $cout2 = $model->getOne2($data);
            }else{
                $cookies = Yii::$app->request->cookies;
                $arr=$cookies->getValue('arr');
                $arr=unserialize($arr);
                //print_r($arr);die;
                $cout1 = $model->getOne1($arr);
                $cout2 = $model->getOne2($arr);
                $cout3 = $model->getOne3($arr);
                $cout4 = $model->getOne4($arr);
            }
            if($cout1||$cout2){
                if($data['hidden']==1){
                    /*
                        生成验证码
                     */
                    $brr = array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
                    $str = "";
                    for($i=1;$i<=6;$i++){
                        $str.=$brr[rand(0,count($brr)-1)];
                    }
                    $arr=array('email'=>$data['email'],'code'=>$str);
                    $email=$arr['email'];
                    //echo $email;die;
                    $arr=serialize($arr);
                    //echo $cookies;die;
                    $cookies = Yii::$app->response->cookies;
                    $cookies->add(new \yii\web\Cookie([
                            'name' => 'arr',
                            'value' => $arr,
                            'expire'=>time()+300
                        ]));
                    $mail= Yii::$app->mailer->compose();   
                    $mail->setTo("$email");  
                    $mail->setSubject("伯乐网验证码");  
                    //$mail->setTextBody("您修改邮件所需要的验证码是：".$str."。");   //发布纯文字文本
                    $mail->setHtmlBody("<br/>您修改邮件所需要的验证码是：".$str.",有效时长为5分钟!");    //发布可以带html标签的文本
                    if($mail->send()){
                        echo "<script>alert('邮件发送成功');</script>";  
                        return $this->renderPartial('reset2.php');
                    }else{  
                        echo "<script>alert('邮件发送失败');</script>";
                        return $this->renderPartial('reset1.php');
                    }
                }else if($data['hidden']==2){
                    $cookies = Yii::$app->request->cookies;
                    $arr=$cookies->getValue('arr');
                    $arr=unserialize($arr);
                    if($data['code']==$arr['code']){
                        echo "<script>alert('验证码正确,请重置密码');</script>";
                        return $this->renderPartial('reset3.php');
                    }else{
                        echo "<script>alert('验证码错误,请重新输入');</script>";
                        return $this->renderPartial('reset2.php');
                    }
                }else{
                     if(md5($data['password'])==$cout3['person_password']||md5($data['password'])==$cout4['company_password']){
                        echo "<script>alert('新旧密码相同,请重新输入');</script>";
                        return $this->renderPartial('reset3.php');
                    }else{
                        $cookies = Yii::$app->request->cookies;
                        $arr=$cookies->getValue('arr');
                        $arr=unserialize($arr);
                        $data['password']=md5($data['password']);
                        $data['email']=$arr['email'];
                        $cout5=$model->update1($data);
                        $cout6=$model->update2($data);
                        if($cout5||$cout6){
                            $data="重置密码成功，请重新登录";
                            $action='user/login';
                            return $this->actionSkip($data,$action); 
                        }else{
                            echo "<script>alert('重置失败，请重新输入');</script>";
                            return $this->renderPartial('reset3.php');
                        }
                        
                    }
                }
            }else{
                echo "<script>alert('您输入的邮箱不存在,请重新输入');</script>";
                return $this->renderPartial('reset1.php');
            }   
        }else{
            return $this->renderPartial('reset1.php');
        }	
    }
    
    public function actionSkip($data,$action){
        return $this->render('Skip.php',['data'=>$data,'action'=>$action]);
    }

}