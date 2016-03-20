
function getMyselfArticle()
{
    var sendString = "";
    //这里是发送post请求的函数
    MYAjaxSubmit("getMySelfText",2,sendString,function(str)
    {
        document.write(str);
    });
}