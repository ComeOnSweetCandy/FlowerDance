
function getMyselfArticle()
{
    var sendString = "";
    //这里是发送post请求的函数
    MYAjaxSubmit("getMySelfText",2,sendString,function(str)
    {
        document.write(str);
    });
}

function resetSign(url)
{
    var send = "";
    MYAjaxSubmit(url,2,send,function(str)
    {
        var obj = JSON.parse(str);
        var string = obj[0]["user_sign"];
        document.getElementById("iUserSingText").value = obj[0]["user_sign"];
    });
}

function changeSign(url)
{
    var sendContent = document.getElementById("iUserSingText").value;
    var send = "newSign="+sendContent;
    MYAjaxSubmit(url,2,send,function(str)
    {
        alert("修改个人签名成功.")
    });
}