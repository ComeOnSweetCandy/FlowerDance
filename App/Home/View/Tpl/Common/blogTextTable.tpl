<!--微博的博文板 一块一块的-->
<link rel="stylesheet" href="__CSS__/blogTextTable.css" xmlns="http://www.w3.org/1999/html">
<script type="text/javascript" language="javascript" src="__JS__/blogTextTable.js"></script>

<foreach name="user_blogs" item="blog">

<div id="iBlogTextTableDiv" name = "article_id_{$blog.article_id}">
    <if condition = "$pageInfo.pageModel eq 1">
        <div id="iDeleteButton"><a id="iDeleteBlogButton" onclick="deleteBlogFunction(this.parentNode.parentNode)" style="cursor: pointer">删除</a></div>
    </if>
    <div id="iTopTableDiv">
        <div id="iImageDiv"><img src="__IMG__/icon/agree.jpg"></div>
        <div id="iNameContentTimeDiv">
            <div id="iNameDiv"  class="cText">
                <strong>
                    <if condition = "$pageInfo.pageMode lt 3">
                        {$userInfo.user_name}
                    <else />
                        {$blog.user_name}
                    </if>
                </strong>
            </div>
            <div id="iBlogContentDiv" class="cText">{$blog.article_content}</div>
            <div id="iTimeDiv" class="cText">{$blog.article_time}</div>
        </div>
        <!--<div id="iFloatRightButton">test</div>-->
    </div>
    <div id="iButtonsDiv">
        <a onclick="collectBlog({$blog.article_id},'{:U('OtherPersonPage/collectBlog')}','{:U('OtherPersonPage/discollectBlog')}')">收藏<i id="i_CollectionsCount{$blog.article_id}">{$blog.article_collection}</i><span></span></a>
        <a href="#">转发<span></span></a>
        <a onclick="showTalkBigBar({$blog.article_id})">评论<i>{$blog.article_talk}</i><span></span></a>
        <a onclick="agreeBlog({$blog.article_id},'{:U('OtherPersonPage/agreeBlog')}','{:U('OtherPersonPage/disagreeBlog')}')">点赞<i id="i_AgreeCount{$blog.article_id}">{$blog.article_agree}</i><img src=""></a>
    </div>
</div>

</foreach>

<!--放在外部 更为清晰一点-->
<div id="btt_ShowTalkBar" style="display: none;">
    <div id="btt_InputTalkBar"><textarea id="btt_InputTalkArea" maxlength="140"></textarea></div>
    <div id="btt_TalkButtonBar">
        <input id="btt_TalkSubmitButton" type="button" value="评论" onclick="submitTalk('{:U('BlogMainPage/submitTalk')}')" />
        <input style="display:none" id="hidden_article_id" value="">
        <input style="display: none;" id="hidden_talk_first" value="">
        <input style="display: none;" id="hidden_talk_count" value="">
        <input style="display: none;" id="hidden_talk_show_url" value="{:U('BlogMainPage/showTalks')}">
    </div>
    <div id="btt_EveryoneTalkContent">
        <!--这里添加 DOM-->
    </div>
    <!--暂时隐藏 需要的时候拿出来-->
    <div id="talk_class" class="talk_class" style="display: none;">
        <div id="talker_img"><img src="__IMG__/icon/sun.gif"></div>
        <div id="talker_right">
            <div id="talk_nameAndSaid" class="talk_nameAndSaid">宇宙无敌威震天:</div>
            <div id="talk_timeAnd" class="talk_timeAnd">123321321</div>
        </div>
    </div>
</div>