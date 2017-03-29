<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Bole后台 | 登 录</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">管理员 登录</div>
            <form action="?r=user/login" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="管理员 登录名"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="密码"/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me" value="1" /> 记住密码
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">提交</button>  
                    
                    <p><a href="#">管理员忘记密码，请联系部门负责人!</a></p>
                    
                    <!-- <a href="register.html" class="text-center">Register a new membership</a> -->
                </div>
            </form>

        </div>


        <!-- jQuery 2.0.2 -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>