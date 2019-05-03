<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/Applications/MAMP/htdocs/cms/public/../application/admin/view/login/login.htm";i:1552488273;}*/ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><!--Head--><head>
    <meta charset="utf-8">
    <title>叶子空间</title>
    <meta name="description" content="login page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="http://localhost/cms/public/static/admin/style/bootstrap.css" rel="stylesheet">
    <link href="http://localhost/cms/public/static/admin/style/font-awesome.css" rel="stylesheet">
    <!--Beyond styles-->
    <link id="beyond-link" href="http://localhost/cms/public/static/admin/style/beyond.css" rel="stylesheet">
    <link href="http://localhost/cms/public/static/admin/style/demo.css" rel="stylesheet">
    <link href="http://localhost/cms/public/static/admin/style/animate.css" rel="stylesheet">
</head>
<!--Head Ends-->
<!--Body-->

<body>
    <div class="login-container animated fadeInDown">
        <form action="" method="post">
            <div class="loginbox bg-white">
                <div class="loginbox-title">SIGN IN</div>
                <div class="loginbox-textbox">
                    <input value="admin" class="form-control" placeholder="username" name="uname" type="text">
                </div>
                <div class="loginbox-textbox">
                    <input class="form-control" placeholder="password" name="password" type="password">
                </div>
                <div class="loginbox-textbox">
                    <input style="width: 50%;float: left;" class="form-control" placeholder="验证码" name="code" type="text">
                    <img onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random()" src="<?php echo captcha_src(); ?>" style="width: 50%;height: 35px;float: left;cursor: pointer;">
                </div>
                <div style="clear: both;" class="loginbox-submit">
                    <input  class="btn btn-primary btn-block" value="Login" type="submit">
                </div>
            </div>
                <div class="logobox">
                    <p class="text-center">叶子空间</p>
                </div>
        </form>
    </div>
    <!--Basic Scripts-->
    <script src="http://localhost/cms/public/static/admin/style/jquery.js"></script>
    <script src="http://localhost/cms/public/static/admin/style/bootstrap.js"></script>
    <script src="http://localhost/cms/public/static/admin/style/jquery_002.js"></script>
    <!--Beyond Scripts-->
    <script src="http://localhost/cms/public/static/admin/style/beyond.js"></script>




</body><!--Body Ends--></html>