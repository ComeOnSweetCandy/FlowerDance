<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>

    <script type="text/javascript" language="javascript" src="__JS__/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="__JS__/register.js"></script>
    <script type="text/javascript" language="javascript" src="__JS__/myPublicFunction.js"></script>
    <link rel="stylesheet" href="__CSS__/register.css">

</head>
<body>
    <img id="backgroundImg2" src="__IMG__/register_background2.jpg" />
    <img id="backgroundImg" src="__IMG__/register_background.jpg" />
    <div id="iAllContent">
        <div id="iLogoContent"><span></span><img src="__IMG__/panda_blog.png" /></div>
        <div id="iCenterContent">
            <div id="iCenterContentDiv">
                <div id="iRegisterBox">
                    <div id="iGuideBox"><p>&gt;&gt;&gt;邮箱注册</p></div>
                    <div id="iRegisterList">
                        <div id="iSplitString"></div>
                        <div id="iRegisterTables">
                            <form name="nameRegisterForm" action="submit" method="post">
                            <table id="iRegisterTable" border="1px solid red">
                                <tr>
                                    <th class="firstC">邮箱:</th><th><input value="dingyukun_2008@163.com" name="table_email"></th><th class="prompt" style="WORD_WRAP:break-word">@fe</th>
                                </tr>
                                <tr>
                                    <th class="firstC">密码:</th><th><input value="kratso2008dyk" name="table_pass"></th><th class="prompt">@提示部分@</th>
                                </tr>
                                <tr>
                                    <th class="firstC">密码确认:</th><th><input value="kratso2008dyk" name="table_passConfirm"></th><th class="prompt">@提示部分@</th>
                                </tr>
                                <tr>
                                    <th class="firstC">注册微博名:</th><th><input value="宇宙无敌魏正天" name="table_name"></th><th class="prompt">@提示部分@</th>
                                </tr>
                                <tr>
                                    <th class="firstC">验证码:</th><th><input type="text" value="7k6a" name="table_confirm" maxlength="5" size="4"><img src="{:U("verify")}" id="iVerifyImg" style="margin-left:10px ;vertical-align: middle" onclick="changeVerify()"></th><th class="prompt">@提示部分@</th>
                                </tr>
                            </table>
                            </form>
                        </div>
                        <div id="iButtonBox" style="text-align: left">
                            <input id="postRegisterMessageButton" type="button" style="width: 400px;height: 70px;margin-left: 30px ; font-size: 30px" value="立即注册" onclick="sendRegisterMessage()">
                        </div>
                    </div>
                </div>
                <div id="iHelpBox">
                    <span></span>
                    <!--<div  style="background-color: red; width: 40px;height: 40px;vertical-align: middle; display: inline-block"></div>-->
                    <div id="iRightSplitString"></div>
                    <div  style=" border: 1px solid red ; width: 95%;height: 460px;vertical-align: middle; display: inline-block"></div>
                </div>
            </div>
        </div>
        <div id="iBottomContent">BOTTOM
        </div>
    </div>



</body>
</html>