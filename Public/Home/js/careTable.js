function careSwitchControl(task)
{
    var careUserId = task.getAttribute("name");
    var dataString = "user_id="+careUserId;
    var sendUrl = document.getElementById("hiddenCareSomeoneStoreUrlButton").innerHTML;

    MYAjaxSubmit(sendUrl,2,dataString,function(str)
    {
        var buttonId = "inputButton"+careUserId;
        var node =document.getElementsByName(buttonId)[0];
        console.log(node);
        node.setAttribute("id","iQuickIgnoreButton");
        node.setAttribute("value","-取消收听");
        node.setAttribute("onclick","ignoreSwitchControl(this.parentNode)");
    });
}

function ignoreSwitchControl(task)
{
    var careUserId = task.getAttribute("name");
    var dataString = "user_id="+careUserId;
    var sendUrl = document.getElementById("hiddenIgnoreSomeoneStoreUrlButton").innerHTML;

    MYAjaxSubmit(sendUrl,2,dataString,function(str)
    {
        var buttonId = "inputButton"+careUserId;
        var node =document.getElementsByName(buttonId)[0];
        node.setAttribute("id","iQuickCareButton");
        node.setAttribute("value","+立即收听");
        node.setAttribute("onclick","careSwitchControl(this.parentNode)");
    });
}

function switchLabel(task,way)
{
    if(way==1)
    {
        //关注
        var careUserId = document.getElementById("opp_UserId").innerHTML;
        var dataString = "user_id="+careUserId;
        var sendUrl = document.getElementById("hiddenCareSomeoneStoreUrlButton").innerHTML;

        console.log(dataString+sendUrl);

        document.getElementById("bpb_CareIgnoreButton").style.backgroundColor=" #ee0308";
        document.getElementById("bpb_CareIgnoreButton").setAttribute("onclick","switchLabel(this,2)");
        document.getElementById("bpb_CareIgnoreButton").setAttribute("value","取消关注");

        MYAjaxSubmit(sendUrl,2,dataString,function(str)
        {
        });

    }
    else if(way == 2)
    {
        //取关
        var careUserId = document.getElementById("opp_UserId").innerHTML;
        var dataString = "user_id="+careUserId;
        var sendUrl = document.getElementById("hiddenIgnoreSomeoneStoreUrlButton").innerHTML;

        document.getElementById("bpb_CareIgnoreButton").style.backgroundColor=" #00ee00";
        document.getElementById("bpb_CareIgnoreButton").setAttribute("onclick","switchLabel(this,1)");
        document.getElementById("bpb_CareIgnoreButton").setAttribute("value","立即关注");

        MYAjaxSubmit(sendUrl,2,dataString,function(str)
        {
        });
    }
}