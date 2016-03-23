
function submitYourBlog()
{
    var blogContent = document.getElementById("iSpeakContent").value;
    var dataString = "blogString="+blogContent;

    MYAjaxSubmit("submitMyBlog",2,dataString,function(str)
    {
        if(str!=0)
        {
            //发布成功 然后需要立即在下方显示 你刚刚提交的 东西
            var baseNode = document.getElementById("iScrollingLeftContent");
            var oldNode = document.getElementById("iBlogTextTableDiv");

            if(!oldNode)
            {
                //以前没有 那就刷新一次页面
                window.location.reload(true);
            }

            var beforeNode = document.getElementById("smp_SeeModel");
            var newNode = oldNode.cloneNode(true);
            var name = document.getElementById("iUserName").innerHTML;
            var number = str.split("\"")[1];

            newNode.setAttribute("name","article_id_"+parseInt(number));
            newNode.getElementsByClassName("cText")[0].innerHTML="<strong>"+name+"</strong>";
            newNode.getElementsByClassName("cText")[1].innerHTML=blogContent;
            newNode.getElementsByClassName("cText")[2].innerHTML="刚刚";

            baseNode.insertBefore(newNode,beforeNode.nextSibling);

            //清空textarea中的内容
            document.getElementById("iSpeakContent").value = "";
        }
        else
        {
            //位置的错误
        }
    });
}

function addBlogsBar(backString)
{
    var obj = JSON.parse(backString);
    var objLength = obj.length;

    var baseNode = document.getElementById("hiddenBlogsInfo");
    var firstBlog = baseNode.getElementsByTagName("span")[0].innerHTML;
    firstBlog = parseInt(firstBlog);
    baseNode.getElementsByTagName("span")[0].innerHTML =firstBlog+objLength;
    document.getElementById("lm_LoadMoreDiv").innerHTML = "<input id='lm_LoadMoreButton' type='button' value='加载更多' onclick='loadMoreBlogs()'>";

    if(objLength==0)
    {
        //说明已经没有新的微博消息了
        return;
    }

    for(var i in obj)
    {
        var str = obj[i];

        var baseNode = document.getElementById("iScrollingLeftContent");
        var oldNode = document.getElementById("iBlogTextTableDiv");
        var beforeNode = document.getElementById("lm_LoadMoreDiv");
        var newNode = oldNode.cloneNode(true);
        var name = document.getElementById("iUserName").innerHTML;
        var number = str["article_id"].split("\"")[1];

        newNode.setAttribute("name","article_id_"+parseInt(number));
        newNode.getElementsByClassName("cText")[0].innerHTML="<strong>"+str["user_id"]+"</strong>";
        newNode.getElementsByClassName("cText")[1].innerHTML=str["article_content"];
        newNode.getElementsByClassName("cText")[2].innerHTML=str["article_time"];

        baseNode.insertBefore(newNode,beforeNode);
    }
}