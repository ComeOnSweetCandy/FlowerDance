<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <script type="text/javascript" language="javascript" src="/Public/Home/js/showMainPage.js"></script>
    <script type="text/javascript" language="javascript" src="/Public/Home/js/myPublicFunction.js"></script>
    <link rel="stylesheet" href="/Public/Home/css/mainPage.css">

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


    <div id="iScrollingAllContent">
        <div id="iScrollingLeftContent" >
            <!--发布个人微博的输入框-->
<link rel="stylesheet" href="/Public/Home/css/submitBlogBar.css">
<script type="text/javascript" language="javascript" src="/Public/Home/js/submitBlog.js"></script>
<link rel="stylesheet" href="/Public/Home/css/giflib.css">
<script type="text/javascript" language="javascript" src="/Public/Home/js/giflib.js"></script>

<div id="submitBlogDiv">
    <div id="iSubmitContentFirstLine">你想说些什么吗:</div>
    <div id="iSubmitContentSecondLine">
        <textarea id="iSpeakContent" maxlength="255" placeholder=""></textarea>
    </div>
    <div id="iSubmitContentThirdLine">
        <a id="giflib_showGifButton" class="/Public/Home/img/gif/" onclick="touchShowGifButton()" style="background: url('/Public/Home/img/gif/smil.png')"></a>
        <input id="iSubmitBlogButton" type="button" value="发布" onclick="submitYourBlog()"  />
    </div>
</div>
            <div id="smp_SeeModel">
                <div style="display: none;" id="smp_HiddenPageMode"><?php echo ($pageInfo["pageMode"]); ?></div>
                <div><a id="<?php if($pageInfo["pageMode"] == 1): ?>smp_ModelButtonType<?php endif; ?>" type="button" value="个人广播" href='<?php echo U('BlogMainPage/showMainPage');?>'>个人广播</a></div>
                <div><a id="<?php if($pageInfo["pageMode"] == 3): ?>smp_ModelButtonType<?php endif; ?>" type="button" value="公众广播" href='<?php echo U('BlogMainPage/showCarePersonsBlogs');?>'>公众广播</a></div>
                <div><a id="<?php if($pageInfo["pageMode"] == 4): ?>smp_ModelButtonType<?php endif; ?>" type="button" value="收藏广播" href='<?php echo U('BlogMainPage/showCollectionBlogs');?>'>收藏广播</a></div>
            </div>
            <!--微博的博文板 一块一块的-->
<link rel="stylesheet" href="/Public/Home/css/blogTextTable.css" xmlns="http://www.w3.org/1999/html">
<script type="text/javascript" language="javascript" src="/Public/Home/js/blogTextTable.js"></script>

<?php if(is_array($user_blogs)): foreach($user_blogs as $key=>$blog): ?><div id="iBlogTextTableDiv" name = "article_id_<?php echo ($blog["article_id"]); ?>">
    <?php if($pageInfo["pageMode"] == 1): ?><div id="iDeleteButton"><a id="iDeleteBlogButton" onclick="deleteBlogFunction(this.parentNode.parentNode)" style="cursor: pointer">删除</a></div><?php endif; ?>
    <div id="iTopTableDiv">
        <div id="iImageDiv"><img src="/Public/Home/uploads/<?php echo ($userInfo["user_img"]); ?>"></div>
        <div id="iNameContentTimeDiv">
            <div id="iNameDiv"  class="cText">
                <strong>
                    <?php if($pageInfo["pageMode"] < 3): echo ($userInfo["user_name"]); ?>
                    <?php else: ?>
                        <?php echo ($blog["user_name"]); endif; ?>
                </strong>
            </div>
            <input id="btt_GifBagUrl" type="button" style="display: none;" value="/Public/Home/img/gif/">
            <div id="iBlogContentDiv" class="cText cTextContent"><?php echo ($blog["article_content"]); ?></div>
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
        <input type="text" maxlength="6" style="width:50px;" value="1" id="btt_InputUserWantPage">
        /<sapn id = "btt_AllTalkCount">1</sapn>
        <input type="button" value="跳转" onclick="showMoreTalks(3)">
        <input type="button" value="后一页" onclick="showMoreTalks(4)">
        <input type="button" value="末页" onclick="showMoreTalks(5)">
    </div>

    <!--暂时隐藏 需要的时候拿出来-->
    <div id="talk_class_copy" class="talk_class_copy" style="display: none;">
        <div id="talker_img"><img src="/Public/Home/img/icon/sun.gif"></div>
        <div id="talker_right">
            <div id="talk_nameAndSaid" class="talk_nameAndSaid">宇宙无敌威震天:</div>
            <div id="talk_timeAnd" class="talk_timeAnd">123321321</div>
        </div>
    </div>
</div>
            <style>
    #lm_LoadMoreDiv
    {
        width: 655px;
        height: 40px;
        margin: 10px 10px;
        padding: 0px;
        border: none;
        border-radius: 3px;
        position: relative;
        background-color: red;
        text-align: center;
        line-height: 40px;
    }
    #lm_LoadMoreDiv #lm_LoadMoreButton
    {
        width: 655px;
        height: 100%;
        background-color: #00ee00;
        border: none;
        line-height: 40px;
        font-size: 17px;
    }
</style>

<script type="text/javascript" language="javascript" src="/Public/Home/js/myPublicFunction.js"></script>
<script>
    function loadMoreBlogs()
    {
        var pageMode = document.getElementById("smp_HiddenPageMode").innerHTML;
        var baseNode = document.getElementById("hiddenBlogsInfo");
        var firstBlog = baseNode.getElementsByTagName("span")[0].innerHTML;
        var blogsCount = baseNode.getElementsByTagName("span")[1].innerHTML;
        var url =  baseNode.getElementsByTagName("span")[2].innerHTML;
        var sendString = "firstBlog="+firstBlog+"&blogsCount="+blogsCount+"&pageMode="+pageMode;
        document.getElementById("lm_LoadMoreDiv").innerHTML="加载中......";

        MYAjaxSubmit(url,2,sendString,function(str)
        {
            addBlogsBar(str);
        });
    }
</script>

<div id="hiddenBlogsInfo" style="display: none"><span><?php echo ($pageInfo["firstBlog"]); ?></span><span><?php echo ($pageInfo["blogsCount"]); ?></span><span><?php echo U("showMoreBlogs");?></span></div>
<div id="lm_LoadMoreDiv">
    <input id="lm_LoadMoreButton" type="button" value="加载更多" onclick="loadMoreBlogs()">
</div>
        </div>
        <div id="iScrollingRightContent">
            <!--个人页面右方包含各种个人信息的滚动栏-->
<link rel="stylesheet" href="/Public/Home/css/personalInformationBar.css">

<div id="iPersonalInformationDiv">
    <div id="iMyselfInfo">
        <div id="iUserImg"><img src="/Public/Home/uploads/<?php echo ($yourInfo["user_img"]); ?>"></div>
        <div id="iUserName"><?php echo ($yourInfo["user_name"]); ?>
        </div>

        <div id="iUserQuickButtonBar">
            <input type="button" id="iFourthButton" value="广播<?php echo sizeof($user_blogs);?>"  onclick="window.location.href='<?php echo U('BlogMainPage/showMainPage');?>'">
            <input type="button" id="iThirdButton" value="收藏0"  onclick="window.location.href='<?php echo U('BlogMainPage/showCollectionBlogs');?>'">
            <input type="button" id="iFirstButton" value="关注<?php echo ($yourInfo["user_care"]); ?>" onclick="window.location.href='<?php echo U("CarepersonList/displayCarePage");?>'">
            <input type="button" id="iSecondButton" value="听众<?php echo ($yourInfo["user_listener"]); ?>" onclick="window.location.href='<?php echo U("CarepersonList/displayListenPage");?>'">
        </div>
    </div>

    <!--显示座右铭的地方-->
    <div id="iUserSignDiv">
        <textarea id="iUserSingText" type="text" placeholder="个性签名"><?php echo ($yourInfo["user_sign"]); ?></textarea>
        <a id="returnEnter" onclick="resetSign('<?php echo U('Setting/resetSign');?>')">撤销</a><a id="submitEnter"  onclick="changeSign('<?php echo U('Setting/changeSign');?>')">提交</a>
    </div>

</div>
        </div>
    </div>

</div>
</body>
</html>