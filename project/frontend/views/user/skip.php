<?php
  use yii\helpers\Url;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台登录</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="style/css/style1.css" />
<style>
body{height:100%;background:#16a085;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
.tishi{
  margin-top:20px;
  text-align: center;
}
h1{
  font-size: 30px;
  margin-top: 300px;
}
p{
  font-size: 20px;
  text-align: center;
}
</style>
<script src="style/js/jquery.js"></script>
<script src="style/js/verificationNumbers.js"></script>
<script src="style/js/Particleground.js"></script>
<script>
$(document).ready(function() {
  //粒子背景特效
  $('body').particleground({
    dotColor: '#5cbdaa',
    lineColor: '#5cbdaa'
  });
});
</script>
</head>
<body>
    <div class="tishi">  
        <h1><?php echo $data ?></h1>
        <p class="p"><span>页面自动<a id="href" href="<?php echo Url::to([$action]) ?>">跳转</a></span><span>等待<b id="wait">2</b>秒</span></p>
    </div>                
</body>
</html>
<script type="text/javascript">                            
    $(function(){
        var wait = document.getElementById('wait'), href = document.getElementById('href').href;
        var interval = setInterval(function() {
            var time = --wait.innerHTML;
            if (time <= 0) {
                location.href = href;
                clearInterval(interval);
            }
            ;
        }, 1000);
    });
</script>