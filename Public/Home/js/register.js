function changeVerify()
{
    var verifyUrl = document.getElementById("verifyImage").getAttribute("src");
    document.getElementById("verifyImage").setAttribute("src",verifyUrl);
}

function touchHelpButton()
{

}

function touchEmailButton()
{

}

function submitButtonClick()
{
    //获取表单中的所有需要的信息，同时进行一些检测 看是否合法
    //var submitString ="type=submit";
    var submitString="";
    var nodeList = document.getElementById("r_CenterRegisterBar").getElementsByTagName("input");

    submitString = submitString + "table_email="+nodeList[0].value;
    submitString = submitString + "&table_name="+nodeList[1].value;
    submitString = submitString + "&table_pass="+nodeList[2].value;
    submitString = submitString + "&table_passConfirm="+nodeList[3].value;
    submitString = submitString + "&table_confirm="+nodeList[4].value;

    //这里是发送post请求的函数
    MYAjaxSubmit("submit",2,submitString,function(str)
    {
        var nodeList = JSON.parse(str);
        var baseNode = document.getElementById("errorPrompt");
        baseNode.innerHTML="";
        var insertString = "";
        for(var i in nodeList)
        {
            insertString = insertString+nodeList[i]+"<br/>";
        }
        baseNode.innerHTML = insertString;
    });
}