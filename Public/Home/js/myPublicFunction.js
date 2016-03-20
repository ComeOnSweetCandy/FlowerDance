var MYLocationHref = "location://";

//url 传递的地址 //submitWay get还是post的方式 //data传递的数据 //respondFunc传递完成后将要返回的数据
function MYAjaxSubmit(url,submitWay,data,respondFunc)
{
    var ajaxHandle;
    if(window.XMLHttpRequest)
    {
        ajaxHandle = new XMLHttpRequest();
    }
    else
    {
        ajaxHandle = new ActiveXObject();
    }

    var sendWay =submitWay==1?'GET':'POST';
    if(submitWay==1)
    {
        url = url+"?"+data;
    }
    ajaxHandle.open(sendWay,url,true);

    if(submitWay==2)
    {
        ajaxHandle.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //////
    }
    ajaxHandle.send(data);
    ajaxHandle.onreadystatechange=function()
    {
        if(ajaxHandle.readyState==4)
        {
            if(ajaxHandle.status==200)
            {
                respondFunc(ajaxHandle.responseText);
            }
            else
            {
                respondFunc(ajaxHandle.responseText);
            }
        }
    }
}
