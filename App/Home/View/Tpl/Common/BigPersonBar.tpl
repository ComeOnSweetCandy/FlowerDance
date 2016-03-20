<link rel="stylesheet" href="__CSS__/bigPersonBar.css">
<script type="text/javascript" language="javascript" src="__JS__/careTable.js"></script>

<div id="bpb_AllContent">
    <div id="bpb_CenterContent">
        <div id="bpb_ImgDiv"><img id="bpb_UserImg" src="__IMG__/icon/public.jpg" /></div>
        <div id="bpb_NameDiv"><p>{$userInfo.user_name}</p><img src="__IMG__/icon/female.png"></div>
        <div id="bpb_SingDiv"><p>{$userInfo.user_sign}</p></div>
        <div id="bpb_CareButton">
            <if condition="$pageInfo.isCare eq 0">
                <input id="bpb_CareIgnoreButton" type="button" onclick="switchLabel(this,1)" name="" value="立即关注" style="background-color: #00ee00;">
            <else />
                <input id="bpb_CareIgnoreButton" type="button" onclick="switchLabel(this,2)" value="取消关注" style="background-color: #ee0308;">
            </if>

            <div id="hiddenCareSomeoneStoreUrlButton" style="display: none">{:U("OtherPersonPage/careUser")}</div>
            <div id="hiddenIgnoreSomeoneStoreUrlButton" style="display: none">{:U("OtherPersonPage/ignoreUser")}</div>

        </div>
    </div>
</div>