<?php
namespace frontend\controllers;
use yii\web\Controller;
use Yii;
class TestController extends Controller{
    public function actionTest(){
//        $request=\YII::$app->request;
//        echo $request->get('id','false');
//        echo $request->post('id','true');
//        echo $request->userIP;
//        if($request->isPost){
//            echo '123';
//        }
//        return $this->render('test');
//        echo "1322";
//        $res=\YII::$app->response;
//        $res->statusCode=305;
//        $res->headers->add('pragma','max-age=5');
//        $res->headers->set('');覆盖
//        $res->headers->remove('');移除
//        下面这句不行问问老师
//        $res->headers->add('location','http://www.baidu.com');
       // $this->redirect('test');
//        $res->headers->add('content-disposition','attachment; file="a.jpg"');
//        $res->sendFile('./robots.txt');
        // $session=\YII::$app->session;
//        $session->set('user','张锦辉');
//        echo $session->get('user');
        // $session['user']='王迪';
        // echo $session['user'];
        return $this->renderPartial('about.html');
    }
     public function actionTest1(){
        return $this->renderPartial('accountBind.html');
     }
    public function actionTest2(){
        return $this->renderPartial('auth.html');
    }
    public function actionTest3(){
        return $this->renderPartial('authSuccess.html');
    }
        public function actionTest4(){
        return $this->renderPartial('autoFilterResumes.html');
    }
        public function actionTest5(){
        return $this->renderPartial('bindstep1.html');
    }
        public function actionTest6(){
        return $this->renderPartial('bindStep2.html');
    }
        public function actionTest7(){
        return $this->renderPartial('bindStep3.html');
    }
        public function actionTest8(){
        return $this->renderPartial('canInterviewResumes.html');
    }
        public function actionTest9(){
        return $this->renderPartial('collections.html');
    }
        public function actionTest10(){
        return $this->renderPartial('companylist.html');
    }
        public function actionTest11(){
        return $this->renderPartial('create.html');
    }
        public function actionTest12(){
        return $this->renderPartial('delivery.html');
    }
        public function actionTest13(){
        return $this->renderPartial('founder.html');
    }
        public function actionTest14(){
        return $this->renderPartial('haveRefuseResumes.html');
    }
        public function actionTest15(){
        return $this->renderPartial('index.html');
    }
        public function actionTest16(){
        return $this->renderPartial('index01.html');
    }
        public function actionTest17(){
        return $this->renderPartial('index02.html');
    }
        public function actionTest18(){
        return $this->renderPartial('index03.html');
    }
        public function actionTest19(){
        return $this->renderPartial('index04.html');
    }
        public function actionTest20(){
        return $this->renderPartial('index06.html');
    }
        public function actionTest21(){
        return $this->renderPartial('jianli.html');
    }
        public function actionTest22(){
        return $this->renderPartial('jobdetail.html');
    }
        public function actionTest23(){
        return $this->renderPartial('list.html');
    }
        public function actionTest24(){
        return $this->renderPartial('login.html');
    }
        public function actionTest25(){
        return $this->renderPartial('mList.html');
    }
        public function actionTest26(){
        return $this->renderPartial('myhome.html');
    }
        public function actionTest27(){
        return $this->renderPartial('positions.html');
    }
        public function actionTest28(){
        return $this->renderPartial('preview.html');
    }
        public function actionTest29(){
        return $this->renderPartial('register.html');
    }
        public function actionTest30(){
        return $this->renderPartial('reset.html');
    }
        public function actionTest31(){
        return $this->renderPartial('subscribe.html');
    }
        public function actionTest32(){
        return $this->renderPartial('subscribe01.html');
    }
    public function actionTest33(){
        return $this->renderPartial('success.html');
    }
    public function actionTest34(){
        return $this->renderPartial('tag.html');
    }
    public function actionTest35(){
        return $this->renderPartial('toudi.html');
    }
    public function actionTest36(){
        return $this->renderPartial('updatePwd.html');
    }

}