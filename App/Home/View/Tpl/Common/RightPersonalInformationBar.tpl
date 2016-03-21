<!--个人页面右方包含各种个人信息的滚动栏-->
<link rel="stylesheet" href="__CSS__/personalInformationBar.css">

<div id="iPersonalInformationDiv">
    <div id="iMyselfInfo">
        <div id="iUserImg"><img src="__UPLOAD__/{$yourInfo.user_img}"></div>
        <div id="iUserName">{$yourInfo.user_name}
        </div>

        <div id="iUserQuickButtonBar">
            <input type="button" id="iFourthButton" value="广播{:sizeof($user_blogs)}"  onclick="window.location.href='{:U('BlogMainPage/showMainPage')}'">
            <input type="button" id="iThirdButton" value="收藏0"  onclick="window.location.href='{:U('BlogMainPage/showCollectionBlogs')}'">
            <input type="button" id="iFirstButton" value="关注{$yourInfo.user_care}" onclick="window.location.href='{:U("CarepersonList/displayCarePage")}'">
            <input type="button" id="iSecondButton" value="听众{$yourInfo.user_listener}" onclick="window.location.href='{:U("CarepersonList/displayListenPage")}'">
        </div>
    </div>

    <!--显示座右铭的地方-->
    <div id="iUserSignDiv">
        <textarea id="iUserSingText" type="text" placeholder="个性签名">{$yourInfo.user_sign}</textarea>
        <a id="returnEnter" onclick="resetSign('{:U('Setting/resetSign')}')">撤销</a><a id="submitEnter"  onclick="changeSign('{:U('Setting/changeSign')}')">提交</a>
    </div>

</div>