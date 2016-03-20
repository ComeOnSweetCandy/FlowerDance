<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的收听听众列表</title>

    <link rel="stylesheet" href="/Public/Home/css/searchPage.css">
    <link rel="stylesheet" href="/Public/Home/css/displayCarePage.css">
<style>
    #pageSwitchContent
    {
        text-align: center;
    }
    #pageSwitchContent a
    {
        text-decoration: none;
    }
</style>

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
            <a onclick="alert('该按钮功能暂时未开放')" ><img src="/Public/Home/img/icon/setting.png"></a>
            <div id="iSearchDiv">
                <span></span>
                <input id="iSearchInput" placeholder="微博用户名/微博ID">
                <img id="iSearchButton" onclick="searchForSomeoneOrBlog()" src="/Public/Home/img/icon/searchButton.png" name="<?php echo U("SearchPage/searchPage");?>">
            </div>
        </div>
    </div>
</div>



    <div id="dp_BottomContent">

        <!--左侧的标签 可以转换的标签-->
        <div id="dp_CenterContent">
            <div id="dp_LabelContent">
                <div id="<?php if($care_mode == 1): ?>dp_MyCare<?php endif; ?>"><a href="<?php echo U('CarepersonList/displayCarePage');?>">我的关注</a></div>
                <div id="<?php if($care_mode == 2): ?>dp_MyCare<?php endif; ?>"><a  href="<?php echo U('CarepersonList/displayListenPage');?>">我的听众</a></div>
            </div>

            <!--右边的列表-->
            <div id="dp_ListContent">
                <div id="dp_BASEHEIGHT"></div>
                <div id="dp_ListTopContent">
                    <?php if($care_mode == 1): ?><div id="dp_TopGuid">您关注的有<?php echo ($searchResContent); ?>人</div>
                    <?php elseif($care_mode == 2): ?>
                    <div id="dp_TopGuid">您的听众有<?php echo ($searchResContent); ?>人</div><?php endif; ?>
                </div>
                <div id="dp_BottomListContent">
                    <?php if(is_array($searchResArray)): foreach($searchResArray as $key=>$per): ?><link rel="stylesheet" href="/Public/Home/css/userInfoBar.css">
<script type="text/javascript" language="javascript" src="/Public/Home/js/careTable.js"></script>

<div id="iSinglePerosonBar" name="<?php echo ($per["user_id"]); ?>">
    <div id="iSinglePersonImg"><img id="iPersonHeadImg" src="/Public/Home/img/icon/agree.jpg" /></div>
    <div id="iSinglePersonInfo">
        <p id="iSinglePersonName"><a href="<?php echo U('OtherPersonPage/displayPage');?>?userID=<?php echo ($per["user_id"]); ?>"><?php echo ($per["user_name"]); ?></a></p>
        <p>听众<?php echo ($per["user_listener"]); ?>|收听<?php echo ($per["user_care"]); ?></p>
    </div>
    <?php if($per["the_true_user_id"] == null): ?><input type="button" id ="iQuickCareButton" name="inputButton<?php echo ($per["user_id"]); ?>" value="+立即收听" onclick="careSwitchControl(this.parentNode)" />
        <?php else: ?>
        <input type="button" id ="iQuickIgnoreButton" name="inputButton<?php echo ($per["user_id"]); ?>" value="-取消收听" onclick="ignoreSwitchControl(this.parentNode)" /><?php endif; ?>
</div><?php endforeach; endif; ?>
                    <?php echo ($show_Page); ?>
                    <div id="hiddenCareSomeoneStoreUrlButton" style="display: none"><?php echo U("Careso/careUser");?></div>
                    <div id="hiddenIgnoreSomeoneStoreUrlButton" style="display: none"><?php echo U("Careso/ignoreUser");?></div>
                </div>
            </div>
        </div>
    </div>

</div>


</body>
</html>