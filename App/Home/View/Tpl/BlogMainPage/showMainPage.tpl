<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <script type="text/javascript" language="javascript" src="__JS__/showMainPage.js"></script>
    <script type="text/javascript" language="javascript" src="__JS__/myPublicFunction.js"></script>
    <link rel="stylesheet" href="__CSS__/mainPage.css">

</head>
<body>

<div id="idAllContent">
    <!--引入顶端的bar-->
    <include file="Common/topUserBar" />

    <div id="iScrollingAllContent">
        <div id="iScrollingLeftContent" >
            <include file="Common/submitBlogBar" />
            <div id="smp_SeeModel">
                <div style="display: none;" id="smp_HiddenPageMode">{$pageInfo.pageMode}</div>
                <div><input id="<if condition = '$pageInfo.pageMode eq 1'>smp_ModelButtonType</if>" type="button" value="个人广播" onclick="window.location.href='{:U('BlogMainPage/showMainPage')}'" /></div>
                <div><input id="<if condition = '$pageInfo.pageMode eq 3'>smp_ModelButtonType</if>" type="button" value="公众广播" onclick="window.location.href='{:U('BlogMainPage/showCarePersonsBlogs')}'" /></div>
                <div><input id="<if condition = '$pageInfo.pageMode eq 4'>smp_ModelButtonType</if>" type="button" value="收藏广播" onclick="window.location.href='{:U('BlogMainPage/showCollectionBlogs')}'" /></div>
            </div>
            <include file="Common/blogTextTable" />
            <include file="Common/loadMore" />
        </div>
        <div id="iScrollingRightContent">
            <include file="Common/RightPersonalInformationBar" />
        </div>
    </div>

</div>
</body>
</html>