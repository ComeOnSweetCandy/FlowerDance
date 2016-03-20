<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <script type="text/javascript" language="javascript" src="/Public/Home/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="/Public/Home/js/jquery.ui.js"></script>
    <script type="text/javascript" language="javascript" src="/Public/Home/js/login.js"></script>
    <script type="text/javascript" language="javascript" src="/Public/Home/js/myPublicFunction.js"></script>
    <link rel="stylesheet" href="/Public/Home/css/jquery.ui.css">
    <link rel="stylesheet" href="/Public/Home/css/login.css">

</head>
<body>

<img src="/Public/Home/img/background.jpg" id="backgroundImg" />
<span id="spanid1" style="position: absolute ; display: block ; top: 20px ; left: 20px ; color: red ; font-size: 30px ;">TEST</span>
<span id="spanid2" style="position: absolute ; display: block ; top: 50px ; left: 20px ; color: red ; font-size: 30px ;">TEST</span>

<div id="idTopRedOrGreen"></div>

<div id="iAllContent">
    <div id="header"></div>
    <div id="iEnterContent">
        <form id="login">
            <p><input type="text" name="user" placeholder="Email" id="idUserEmail" value=""></p>
            <p><input type="password" name="password" placeholder="Password" id="idUserPassword" value=""></p>
            <p id="inputButtonDiv">
                <input type="button" name="regesitButton" value="注册" id="idRegisterButton" onclick="window.location.href='<?php echo U('Register/index');?>'">
                <input type="hidden" id="idLocationContent" value="{/index.php}">
                <input type="button" name="<?php echo U("confirmLoginAction");?>" value="登录" id="idLoginButton"></p>
        </form>
        <div id="iSpecialContent">
            <a href="" name="versionButton" id="versionButton">version:1.0.0</a>
            <a href="" name="forgetPasswordButton" id="forgetPasswordButton">忘记密码</a>
        </div>
    </div>
</div>

<div id="footer">
    <p>| <a href="">关于熊猫微博</a> | <a href="">联系我们</a> | <a href="">诚招英才</a> | <a href="">关于熊猫公司</a> |</p>
    <p>熊猫微博版权所有 2011-2017 ICP证：皖H2-20150087</p>
</div>



</body>
</html>