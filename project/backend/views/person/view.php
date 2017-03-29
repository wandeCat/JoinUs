<?php
header("content-type:text/html;charset=utf-8");
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Person */

// $this->title = $model->person_id;
// $this->params['breadcrumbs'][] = ['label' => 'People', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
if(empty($_COOKIE['username'])){
    echo "亲，请登录！<a href='http://www.lpcgogo.com/JoinUs/JoinUs/backend/web/?r=user/login'>登录</a>";
    die;
}
?>

<!DOCTYPE html>
<html>
    <head>
    <base href="http://www.lpcgogo.com/JoinUs/JoinUs/backend/web/">
        <meta charset="UTF-8">
        <title>BoLe后台管理系统</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome 字体-->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons 图标-->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart 图-->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <!-- <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" /> -->
        <!-- fullCalendar -->
        <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
        <!-- Daterange picker 日期范围-->
        <!-- <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" /> -->
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="?r=user/admin" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
               伯乐招聘后台管理系统      
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
    

                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $_COOKIE['username'];?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $_COOKIE['username'];?>
                                        <small><?php echo date('Y-m-d');?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->

                                <!-- Menu Footer-->
                              <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">管理员简介</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="?r=user/logout" class="btn btn-default btn-flat">退出</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->


                <!-- 左侧栏 start-->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <!-- <p>Hello, Jane</p> -->
        <!-- 展示登录人信息 -->
<p>Hello, <?php echo $_COOKIE['username'];?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                  

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="?r=user/index">
                                <i class="fa fa-dashboard"></i> <span>管理员管理</span>
                            </a>
                        </li>


                        <li class="treeview">
                            <a href="?r=person/index">
                                <i class="fa fa-th"></i>
                                <span>个人用户管理</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="?r=person/index"><i class="fa fa-angle-double-right"></i> 个人信息</a></li>
                                <li><a href="?r=resume/index"><i class="fa fa-angle-double-right"></i>个人简历</a></li>
                    
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-th"></i>
                                <span>公司用户管理</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="?r=compeny-info/index"><i class="fa fa-angle-double-right"></i>公司信息</a></li>
                                <li><a href="?r=job/index"><i class="fa fa-angle-double-right"></i>公司职位</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-th"></i>
                                <span>广告管理</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="?r=advert/index"><i class="fa fa-angle-double-right"></i>广告信息</a></li>
                            </ul>
                        </li>

                        
                    
                    </ul>
                </section>
                <!-- /.sidebar -->
                <!-- 左侧栏 end-->




            </aside>

            <aside class="right-side">
                
                <!-- 内容模块头部 start-->
                <!-- Content Header (Page header) -->
                    <section class="content-header no-margin">
                        <h1 class="text-center">
                            用户信息管理
                        </h1>
                        <h4 class="text-center">
                            <small>资源成可贵 <code>-</code> 管理需谨慎</small>
                        </h4>
                    </section>
                <!-- 内容模块 头部 end-->

                <!-- 内容主模块 start-->
                <section class="content">
                            

<div class="person-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->person_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->person_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'person_id',
            'person_email:email',
            'person_password',
            'type',
        ],
    ]) ?>

</div>


                </section>
                <!-- 内容主模块 end-->

            </aside>

<!-- jQuery 2.0.2 -->
        <script src="js/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="js/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline 迷你图-->
        <!-- // <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script> -->
        <!-- jvectormap -->
        <!-- // <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script> -->
        <!-- // <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script> -->
        <!-- fullCalendar 日志 -->
        <!-- script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script> -->
        <!-- jQuery Knob Chart  旋钮图-->
        <!-- // <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script> -->
        <!-- daterangepicker日期范围 -->
        <!-- // <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script> -->
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes)仪表 -->
        <!-- <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>  -->    


    </body>
</html>
