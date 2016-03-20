<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户个人设定</title>

    <link rel="stylesheet" href="/Public/Home/css/mainPage.css">
    <link rel="stylesheet" href="/Public/Home/css/settingPage.css">
    <script type="text/javascript" language="javascript" src="/Public/Home/js/settingPage.js"></script>

</head>
<body>

<div id="idAllContent">
    <!--引入顶端的bar-->
    <link rel="stylesheet" href="/Public/Home/css/topBar.css">
<script type="text/javascript" language="javascript" src="/Public/Home/js/topUserBar.js"></script>
<script type="text/javascript" language="javascript" src="/Public/Home/js/myPublicFunction.js"></script>

<div id="iTopBarContent">
    <div id="iFixedWidth">
        <a id="iLogo" href="<?php echo U('BlogMainPage/showMainPage');?>"></a>
        <div id="iRightBar">
            <a id="iUserName"><?php echo ($yourInfo["user_name"]); ?></a>
            <a onclick="" href="<?php echo U('BlogMainPage/showMainPage');?>"><img src="/Public/Home/img/icon/home.png"></a>
            <a onclick="" href="<?php echo U('CarepersonList/displayCarePage');?>"><img src="/Public/Home/img/icon/view.png"></a>
            <a onclick="" href="<?php echo U('CarepersonList/displayListenPage');?>"><img src="/Public/Home/img/icon/listener.png"></a>
            <a onclick="" href="<?php echo U('Login/index');?>"><img src="/Public/Home/img/icon/exit.png"></a>
            <a onclick="" href="<?php echo U('Setting/displaySettingPage');?>" ><img src="/Public/Home/img/icon/setting.png"></a>
            <div id="iSearchDiv">
                <span></span>
                <input id="iSearchInput" placeholder="微博用户名/微博ID">
                <img id="iSearchButton" onclick="searchForSomeoneOrBlog()" src="/Public/Home/img/icon/searchButton.png" name="<?php echo U("SearchPage/searchPage");?>">
            </div>
        </div>
    </div>
</div>

    <div id="settingPageAllContent">
        <div id="settingImageContent">
            <div id="dsp_ImageBar">
                <img id="dsp_UserImage" src="/Public/Home/img/icon/agree.jpg" name="/Public/Home/uploads">
            </div>
            <div id="dsp_ImageRightBar">
                <form id="form" method="post" action="<?php echo U('Setting/Upload');?>" enctype="multipart/form-data" target="result_frame">
                    <span id="spanModel"></span>
                    <a>选择图片<input type="file" id="uploadContent" name="文件上传" /></a>
                    <input type="submit" id="uplodaButton" value="上传">
                </form>
            </div>
        </div>
    </div>
<div>

    <iframe id="uploadframe" name="result_frame" style="display: none"></iframe>

</body>
</html>