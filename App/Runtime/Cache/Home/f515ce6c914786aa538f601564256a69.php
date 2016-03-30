<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <title>$Title$</title>

    <link rel="stylesheet" href="/Public/Home/css/searchPage.css">

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

    <link rel="stylesheet" href="/Public/Home/css/topSearchDiv.css">

<div id="iTopSearchWidthDiv">
  <div id="iTopSearchDiv">
      <div id="iSearchMethod"><a href="#" id="iSearchTypeSwitch">用户</a></div>
      <div id="iSearchContentDiv"><div id="iSearchBarContent"><input style="text-decoration: none" type="text" maxlength="25" id="iSearchContent" value="<?php echo ($searchContent); ?>"><input id="iSearchConfirmButton" type="button" value="搜索"></div></div>
  </div>
</div>

    <div id="iScrollingAllContent">
        <div id="iScrollingLeftContent" >

            <div id="iLeftResultsContent">
                <div id="iSearchResultsNumber" style="border-bottom: 1px solid black">搜索结果为 <?php echo ($searchResContent); ?> 条</div>

                <?php if(is_array($searchResArray)): foreach($searchResArray as $key=>$per): ?><link rel="stylesheet" href="/Public/Home/css/careTable.css">
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
                <div id="hiddenCareSomeoneStoreUrlButton" style="display: none"><?php echo U("Careso/careUser");?></div>
                <div id="hiddenIgnoreSomeoneStoreUrlButton" style="display: none"><?php echo U("Careso/ignoreUser");?></div>
            </div>

        </div>
        <div id="iScrollingRightContent">
            <div id="iRightHistorySearch">

            </div>
        </div>
    </div>

</div>


</body>
</html>