<link rel="stylesheet" href="__CSS__/topBar.css">
<script type="text/javascript" language="javascript" src="__JS__/topUserBar.js"></script>
<script type="text/javascript" language="javascript" src="__JS__/myPublicFunction.js"></script>

<div id="iTopBarContent">
    <div id="iFixedWidth">
        <a id="iLogo" href="{:U('BlogMainPage/showMainPage')}"></a>
        <div id="iRightBar">
            <a id="iUserName">{$yourInfo.user_name}</a>
            <a onclick="" href="{:U('BlogMainPage/showMainPage')}"><img src="__IMG__/icon/home.png"></a>
            <a onclick="" href="{:U('CarepersonList/displayCarePage')}"><img src="__IMG__/icon/view.png"></a>
            <a onclick="" href="{:U('CarepersonList/displayListenPage')}"><img src="__IMG__/icon/listener.png"></a>
            <a onclick="" href="{:U('Login/index')}"><img src="__IMG__/icon/exit.png"></a>
            <a onclick="alert('该按钮功能暂时未开放')" ><img src="__IMG__/icon/setting.png"></a>
            <div id="iSearchDiv">
                <span></span>
                <input id="iSearchInput" placeholder="微博用户名/微博ID">
                <img id="iSearchButton" onclick="searchForSomeoneOrBlog()" src="__IMG__/icon/searchButton.png" name="{:U("SearchPage/searchPage")}">
            </div>
        </div>
    </div>
</div>
