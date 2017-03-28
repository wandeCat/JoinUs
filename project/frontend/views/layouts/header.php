<?php
use yii\helpers\Url;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>伯乐招聘</title>
</head>
<body>
    <div id="header">
        <div class="wrapper">
            <a href="index.html" class="logo">
                <img src="style/images/logo.png" width="229" height="43" alt="拉勾招聘-专注互联网招聘" />
            </a>
            <ul class="reset" id="navheader">
                <li class="current"><a href="?r=index/index">首页</a></li>
                <li ><a href="?r=company/index" >公司</a></li>
               
                                    <li ><a href="?r=pre/myhome" rel="nofollow">我的简历</a></li>
                                                    <li ><a href="<?= Url::to(['job/create'])?>" rel="nofollow">发布职位</a></li>
                            </ul>
                        <ul class="loginTop">
                <li><a href="<?= Url::to(['user/login'])?>" rel="nofollow">登录</a></li> 
                <li>|</li>
                <li><a href="<?= Url::to(['user/register'])?>" rel="nofollow">注册</a></li>
            </ul>
                                </div>
    </div>
    <?= $content?>
</body>


</html>

    