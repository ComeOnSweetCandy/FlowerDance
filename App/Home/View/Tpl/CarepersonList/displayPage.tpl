<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的收听听众列表</title>

    <link rel="stylesheet" href="__CSS__/searchPage.css">
    <link rel="stylesheet" href="__CSS__/displayCarePage.css">
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
    <include file="Common/topUserBar" />


    <div id="dp_BottomContent">

        <!--左侧的标签 可以转换的标签-->
        <div id="dp_CenterContent">
            <div id="dp_LabelContent">
                <div id="<if condition = '$care_mode eq 1'>dp_MyCare</if>"><a href="{:U('CarepersonList/displayCarePage')}">我的关注</a></div>
                <div id="<if condition = '$care_mode eq 2'>dp_MyCare</if>"><a  href="{:U('CarepersonList/displayListenPage')}">我的听众</a></div>
            </div>

            <!--右边的列表-->
            <div id="dp_ListContent">
                <div id="dp_BASEHEIGHT"></div>
                <div id="dp_ListTopContent">
                    <if condition = "$care_mode eq 1">
                    <div id="dp_TopGuid">您关注的有{$searchResContent}人</div>
                    <elseif condition = "$care_mode eq 2" />
                    <div id="dp_TopGuid">您的听众有{$searchResContent}人</div>
                    </if>
                </div>
                <div id="dp_BottomListContent">
                    <foreach name="searchResArray" item="per">
                        <include file = "Common/userInfoBar" />
                    </foreach>
                    {$show_Page}
                    <div id="hiddenCareSomeoneStoreUrlButton" style="display: none">{:U("Careso/careUser")}</div>
                    <div id="hiddenIgnoreSomeoneStoreUrlButton" style="display: none">{:U("Careso/ignoreUser")}</div>
                </div>
            </div>
        </div>
    </div>

</div>


</body>
</html>