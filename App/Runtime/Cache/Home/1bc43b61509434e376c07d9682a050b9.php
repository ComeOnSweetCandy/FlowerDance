<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>$Title$</title>

    <link rel="stylesheet" href="/Public/Home/css/mainPage.css">
    <link rel="stylesheet" href="/Public/Home/css/OtherPersonPage.css">

</head>
<body>

<div style="display: none;" id="opp_UserId"><?php echo ($userInfo["user_id"]); ?></div>

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

    <link rel="stylesheet" href="/Public/Home/css/bigPersonBar.css">
<script type="text/javascript" language="javascript" src="/Public/Home/js/careTable.js"></script>

<div id="bpb_AllContent">
    <div id="bpb_CenterContent">
        <div id="bpb_ImgDiv"><img id="bpb_UserImg" src="/Public/Home/img/icon/public.jpg" /></div>
        <div id="bpb_NameDiv"><p><?php echo ($userInfo["user_name"]); ?></p><img src="/Public/Home/img/icon/female.png"></div>
        <div id="bpb_SingDiv"><p><?php echo ($userInfo["user_sign"]); ?></p></div>
        <div id="bpb_CareButton">
            <?php if($pageInfo["isCare"] == 0): ?><input id="bpb_CareIgnoreButton" type="button" onclick="switchLabel(this,1)" name="" value="立即关注" style="background-color: #00ee00;">
            <?php else: ?>
                <input id="bpb_CareIgnoreButton" type="button" onclick="switchLabel(this,2)" value="取消关注" style="background-color: #ee0308;"><?php endif; ?>

            <div id="hiddenCareSomeoneStoreUrlButton" style="display: none"><?php echo U("OtherPersonPage/careUser");?></div>
            <div id="hiddenIgnoreSomeoneStoreUrlButton" style="display: none"><?php echo U("OtherPersonPage/ignoreUser");?></div>

        </div>
    </div>
</div>

    <div id="opp_BottomContent">
        <div id="bpp_LeftContent">
            <div id="opp_CareContent">
                <div id="opp_CareBlogsCount">广播<?php echo ($userInfo["user_blog"]); ?></div>
                <div id="opp_CareCaresCount">收听<?php echo ($userInfo["user_care"]); ?></div>
                <div id="opp_CareListenersCount">听众<?php echo ($userInfo["user_listener"]); ?></div>
            </div>
        </div>
        <div id="bpp_RightContent">
            <div id="opp_BlogsContent">
                <!--微博的博文板 一块一块的-->
<link rel="stylesheet" href="/Public/Home/css/blogTextTable.css" xmlns="http://www.w3.org/1999/html">
<script type="text/javascript" language="javascript" src="/Public/Home/js/blogTextTable.js"></script>

<?php if(is_array($user_blogs)): foreach($user_blogs as $key=>$blog): ?><div id="iBlogTextTableDiv" name = "article_id_<?php echo ($blog["article_id"]); ?>">
    <?php if($pageInfo["pageModel"] == 1): ?><div id="iDeleteButton"><a id="iDeleteBlogButton" onclick="deleteBlogFunction(this.parentNode.parentNode)" style="cursor: pointer">删除</a></div><?php endif; ?>
    <div id="iTopTableDiv">
        <div id="iImageDiv"><img src="/Public/Home/img/icon/agree.jpg"></div>
        <div id="iNameContentTimeDiv">
            <div id="iNameDiv"  class="cText">
                <strong>
                    <?php if($pageInfo["pageMode"] < 3): echo ($userInfo["user_name"]); ?>
                    <?php else: ?>
                        <?php echo ($blog["user_name"]); endif; ?>
                </strong>
            </div>
            <div id="iBlogContentDiv" class="cText"><?php echo ($blog["article_content"]); ?></div>
            <div id="iTimeDiv" class="cText"><?php echo ($blog["article_time"]); ?></div>
        </div>
        <!--<div id="iFloatRightButton">test</div>-->
    </div>
    <div id="iButtonsDiv">
        <a onclick="collectBlog(<?php echo ($blog["article_id"]); ?>,'<?php echo U('OtherPersonPage/collectBlog');?>','<?php echo U('OtherPersonPage/discollectBlog');?>')">收藏<i id="i_CollectionsCount<?php echo ($blog["article_id"]); ?>"><?php echo ($blog["article_collection"]); ?></i><span></span></a>
        <a href="#">转发<span></span></a>
        <a onclick="showTalkBigBar(<?php echo ($blog["article_id"]); ?>)">评论<i><?php echo ($blog["article_talk"]); ?></i><span></span></a>
        <a onclick="agreeBlog(<?php echo ($blog["article_id"]); ?>,'<?php echo U('OtherPersonPage/agreeBlog');?>','<?php echo U('OtherPersonPage/disagreeBlog');?>')">点赞<i id="i_AgreeCount<?php echo ($blog["article_id"]); ?>"><?php echo ($blog["article_agree"]); ?></i><img src=""></a>
    </div>
</div><?php endforeach; endif; ?>

<!--放在外部 更为清晰一点-->
<div id="btt_ShowTalkBar" style="display: none;">
    <div id="btt_InputTalkBar"><textarea id="btt_InputTalkArea" maxlength="140"></textarea></div>
    <div id="btt_TalkButtonBar">
        <input id="btt_TalkSubmitButton" type="button" value="评论" onclick="submitTalk('<?php echo U('BlogMainPage/submitTalk');?>')" />
        <input style="display:none" id="hidden_article_id" value="">
        <input style="display: none;" id="hidden_talk_first" value="">
        <input style="display: none;" id="hidden_talk_count" value="">
        <input style="display: none;" id="hidden_talk_All_Count" value="">
        <input style="display: none;" id="hidden_talk_All_Pages" value="">
        <input style="display: none;" id="hidden_talk_Pre_Pages" value="">
        <input style="display: none;" id="hidden_talk_show_url" value="<?php echo U('BlogMainPage/showTalks');?>">
    </div>
    <div id="btt_EveryoneTalkContent">
        <!--这里添加 DOM-->
    </div>

    <!--这里存放页面按钮-->
    <div id="btt_PageContent" style="display: none">
        <input type="button" value="首页" onclick="showMoreTalks(1)">
        <input type="button" value="前一页" onclick="showMoreTalks(2)">
        <input type="text" maxlength="6" style="width:50px;" value="1">
        /<sapn id = "btt_AllTalkCount">1</sapn>
        <input type="button" value="跳转" onclick="showMoreTalks(3)">
        <input type="button" value="后一页" onclick="showMoreTalks(4)">
        <input type="button" value="末页" onclick="showMoreTalks(5)">
    </div>

    <!--暂时隐藏 需要的时候拿出来-->
    <div id="talk_class" class="talk_class" style="display: none;">
        <div id="talker_img"><img src="/Public/Home/img/icon/sun.gif"></div>
        <div id="talker_right">
            <div id="talk_nameAndSaid" class="talk_nameAndSaid">宇宙无敌威震天:</div>
            <div id="talk_timeAnd" class="talk_timeAnd">123321321</div>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>

</div>

</body>
</html>