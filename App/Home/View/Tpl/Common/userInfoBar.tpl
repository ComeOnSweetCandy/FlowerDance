<link rel="stylesheet" href="__CSS__/userInfoBar.css">
<script type="text/javascript" language="javascript" src="__JS__/careTable.js"></script>

<div id="iSinglePerosonBar" name="{$per.user_id}">
    <div id="iSinglePersonImg"><img id="iPersonHeadImg" src="__IMG__/icon/agree.jpg" /></div>
    <div id="iSinglePersonInfo">
        <p id="iSinglePersonName"><a href="{:U('OtherPersonPage/displayPage')}?userID={$per.user_id}">{$per.user_name}</a></p>
        <p>听众{$per.user_listener}|收听{$per.user_care}</p>
    </div>
    <if condition = "$per.the_true_user_id eq null">
        <input type="button" id ="iQuickCareButton" name="inputButton{$per.user_id}" value="+立即收听" onclick="careSwitchControl(this.parentNode)" />
        <else />
        <input type="button" id ="iQuickIgnoreButton" name="inputButton{$per.user_id}" value="-取消收听" onclick="ignoreSwitchControl(this.parentNode)" />
    </if>
</div>