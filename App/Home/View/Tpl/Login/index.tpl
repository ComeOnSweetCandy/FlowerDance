<!DOCTYPE html>
<html lang="en" manifest="Name.manifest">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <script type="text/javascript" language="javascript" src="__JS__/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="__JS__/jquery.ui.js"></script>
    <script type="text/javascript" language="javascript" src="__JS__/login.js"></script>
    <script type="text/javascript" language="javascript" src="__JS__/myPublicFunction.js"></script>
    <link rel="stylesheet" href="__CSS__/jquery.ui.css">
    <link rel="stylesheet" href="__CSS__/login.css">

</head>

<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1258143544'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1258143544%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>

<body>

<div id="idTopRedOrGreen">

</div>

<div id="iBottomMessage">
    <div id="iCenterC">
        欢迎来到微博 __APP_VERSION__
    </div>
</div>

<div id="iTureAllContent">
    <div id="iLeftAllContent" style="overflow: hidden">
        <div class="imgWall" id="imgWall1"></div>
        <div class="imgWall" id="imgWall2"></div>
        <div class="imgWall" id="imgWall3"></div>
        <div class="imgWall" id="imgWall4"></div>
        <div class="" id="imgWall5"></div>
        <div class="" id="imgWall6"></div>
        <div id="hidden_CurImg" style="display: none">0</div>
        <div id="floatButtonContent">
            <a class="switchBackImgButton" href="javascript::void(0)" onclick="switchBackImg(0)" style="color: red;">0</a>
            <a class="switchBackImgButton" href="javascript::void(0)" onclick="switchBackImg(1)">1</a>
            <a class="switchBackImgButton" href="javascript::void(0)" onclick="switchBackImg(2)">2</a>
            <a class="switchBackImgButton" href="javascript::void(0)" onclick="switchBackImg(3)">3</a>
        </div>
    </div>
    <div id="iAllContent">
        <div id="header"><span>熊猫微博</span></div>
        <div id="iEnterContent">
            <form id="login">
                <p><input maxlength="40" type="text" name="user" placeholder="邮箱" id="idUserEmail" value=""></p>
                <p><input maxlength="16" type="password" name="password" placeholder="密码" id="idUserPassword" value=""></p>
                <p id="inputButtonDiv">
                    <a type="button" class="regitsteAndLoginButton" name="regesitButton" value="注册" id="idRegisterButton" href='{:U('Register/index')}' ">注册</a>
                    <a type="hidden" id="idLocationContent" value="{__APP__}">
                    <a type="button" class="regitsteAndLoginButton"  name="{:U("confirmLoginAction")}" value="登录" id="idLoginButton">登录</p>
            </form>
            <div id="iSpecialContent">
                <a href="" name="versionButton" id="versionButton"></a>
                <a href="" name="forgetPasswordButton" id="forgetPasswordButton">忘记密码</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>