<!--个人页面右方包含各种个人信息的滚动栏-->
<link rel="stylesheet" href="__CSS__/personalInformationBar.css">

<div id="iPersonalInformationDiv">
    <div id="iMyselfInfo">
        <div id="iUserImg"></div>
        <div id="iUserName">{$yourInfo.user_name}
        </div>

        <div id="iUserQuickButtonBar">
            <input type="button" id="iFourthButton" value="广播{:sizeof($user_blogs)}">
            <input type="button" id="iThirdButton" value="收藏0">
            <input type="button" id="iFirstButton" value="关注{$yourInfo.user_care}" onclick="window.location.href='{:U("CarepersonList/displayCarePage")}'">
            <input type="button" id="iSecondButton" value="听众{$yourInfo.user_listener}" onclick="window.location.href='{:U("CarepersonList/displayListenPage")}'">
        </div>
    </div>
</div>