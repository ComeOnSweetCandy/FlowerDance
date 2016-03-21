<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>微博注册页面</title>

    <script type="text/javascript" language="javascript" src="__JS__/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="__JS__/register.js"></script>
    <script type="text/javascript" language="javascript" src="__JS__/myPublicFunction.js"></script>
    <link rel="stylesheet" href="__CSS__/register.css">

</head>
<body>

<div id="i_AllContent">
    <div id="r_TopUserBar">
        <div id="r_UserPrompt"><span></span>如果您已经拥有了账号,可以连接此处直接登录<a href="{:U('Login/index')}" type="button" value="点此登录">点此登录</a></div>
    </div>

    <div id="r_CenterBar">
        <div id="r_CenterRegisterBar">
            <div id="registerGuidDiv">
                <a id="regiterEmailButton"></a>
                <a id="regiterPhoneButton" onclick="alert('暂不支持手机注册')"></a>
                <a id="regiterHelpButton" onclick="alert('帮助功能暂未开放,请更新浏览器')"></a>
            </div>
            <div id="errorPrompt"></div>
            <div id="hiddenHelpPage">test</div>
            <div class="bigDivArray">
                <input maxlength="40" class="bigInputArray" placeholder="邮箱地址" value="" type="text">
            </div>
            <div class="bigDivArray">
                <input maxlength="20" class="bigInputArray" placeholder="个人微博名" value="" type="text">
            </div>
            <div class="bigDivArray">
                <input maxlength="16" class="bigInputArray" placeholder="登录密码" value="" type="text">
            </div>
            <div class="bigDivArray">
                <input maxlength="16" class="bigInputArray" placeholder="确认密码" value="" type="text">
            </div>
            <div id="verifyDiv" class="bigDivArray">
                <span></span>
                <input maxlength="4" id="verifyInput" class="bigInputArray" placeholder="输入验证码" value="" type="text">
                <img id="verifyImage" src="{:U('verify')}" onclick="changeVerify()">
            </div>
            <div class="bigDivArray">
                <input class="submitButton" value="注册提交" type="button" onclick="submitButtonClick()">
            </div>
        </div>
    </div>
</div>

</body>
</html>