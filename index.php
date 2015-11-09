<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>
        PANDAi
    </title>
    <link rel="stylesheet" href="asset/css/reset.css" type="text/css">
    <link rel="stylesheet" href="asset/css/style.css" type="text/css">
</head>
<body>
<div id="wrapper">
    <a class="site-logo" href="#">PANDAi</a>
    <div id="container">
        <!-- main start -->
        <div id="index-form">
            <form id="index-form-login" action="#">
                <fieldset>
                    <div class="index-form-item">
                        <label for="loginId">用户名</label><input type="text" name="loginId" id="loginId">
                    </div>
                    <div class="index-form-item">
                        <label for="loginId">密码</label><input type="password" name="loginPwd" id="loginPwd">
                    </div>
                    <div class="index-form-item">
                        <p class="error">登录信息有误.</p>
                    </div>
                    <div class="index-form-item">
                        <input type="button" id="login_button" value="登录">
                    </div>
                    <div class="index-form-item">
                        <a class="toggle-form" href="#">创建新的账户</a> &nbsp;&nbsp; <a href="#">忘记密码</a>
                    </div>
                </fieldset>
            </form>
            <form id="index-form-reg" action="#" style="display:none;">
                <fieldset>
                    <div class="index-form-item">
                        <label for="loginId">用户名</label><input type="text" name="loginId" id="loginId">
                    </div>
                    <div class="index-form-item">
                        <label for="loginId">密码</label><input type="password" name="loginPwd" id="loginPwd">
                    </div>
                    <div class="index-form-item">
                        <label for="loginRePwd">再次输入密码</label><input type="password" name="loginRePwd" id="loginRePwd">
                    </div>
                    <div class="index-form-item">
                        <label for="email">邮箱</label><input type="email" name="email" id="email">
                    </div>
                    <div class="index-form-item">
                    <p class="error">注册信息有误,请重新填写.</p>
                    </div>
                    <div class="index-form-item">
                        <input type="button" id="reg_button" value="注册">
                    </div>
                    <div class="index-form-item">
                        <a class="toggle-form" href="#">已有账号? 登录 </a>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<div id="footer">
    <!-- footer start -->
    <p>
        ©All RIGHTS RESERVED.
    </p><br>

    <p>
        CREATE BY BUSHUAI @ NPUMD
    </p>

</div>
<!-- footer ends -->
<script src="asset/lib/jquery-1.7.1.min.js" type="text/javascript">
</script>
<script src="asset/lib/masonry.pkgd.min.js" type="text/javascript">
</script>
<script src="asset/lib/imagesloaded.pkgd.min.js" type="text/javascript">
</script>
<script src="asset/lib/jquery.slides.min.js" type="text/javascript"></script>
<script src="asset/lib/action.common.js" type="text/javascript">
</script>
</body>
</html>