<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>$Title$</title>

    <link rel="stylesheet" href="__CSS__/mainPage.css">
    <link rel="stylesheet" href="__CSS__/OtherPersonPage.css">

</head>
<body>

<div style="display: none;" id="opp_UserId">{$userInfo.user_id}</div>

<div id="idAllContent">
  <!--引入顶端的bar-->
    <include file="Common/topUserBar" />
    <include file = "Common/BigPersonBar" />

    <div id="opp_BottomContent">
        <div id="bpp_LeftContent">
            <div id="opp_CareContent">
                <div id="opp_CareBlogsCount">广播{$userInfo.user_blog}</div>
                <div id="opp_CareCaresCount">收听{$userInfo.user_care}</div>
                <div id="opp_CareListenersCount">听众{$userInfo.user_listener}</div>
            </div>
        </div>
        <div id="bpp_RightContent">
            <div id="opp_BlogsContent">
                <include file="Common/blogTextTable" />
            </div>
        </div>
    </div>

</div>

</body>
</html>