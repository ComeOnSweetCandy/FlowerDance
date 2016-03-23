
function deleteBlogFunction(task)
{
    //首先获取其ID值
    var article_id = task.getAttribute("name");
    var stringArray = article_id.split("_");
    var deleteBlogID = stringArray[2];
    var data = "articleID="+deleteBlogID;

    console.log("tag 2");
    console.log(data);

    MYAjaxSubmit("deleteMyBlog",2,data,function(str)
    {
        if(str==1)
        {
            //删除成功
            var deleteNode = document.getElementsByName("article_id_"+deleteBlogID)[0];
            deleteNode.parentNode.removeChild(deleteNode);
        }
        else if(str==0)
        {
            //查无此微博
        }
    });
}

//收藏该博文
function collectBlog(blogId,url,deleteUrl)
{
    var sendString = "blogId="+blogId;
    MYAjaxSubmit(url,2,sendString,function(str)
    {
        if(str==1)
        {
            var count = document.getElementById("i_CollectionsCount"+blogId).innerHTML;
            count = parseInt(count);
            count=count+1;
            var count = document.getElementById("i_CollectionsCount"+blogId).innerHTML = count;
        }
        else if(str==0)
        {
            //alert("您已经收藏过该篇广播,是否需要取消收藏",true,false);
            var res = confirm("您已经收藏过该篇广播,是否需要取消收藏");
            if(res==true)
            {
                //取消收藏广播
                discollectBlog(blogId,deleteUrl);
            }
            else if(res==false)
            {
                //不取消收藏广播
            }
        }
    });
}

function discollectBlog(blogId,url)
{
    var sendString = "blogId="+blogId;
    MYAjaxSubmit(url,2,sendString,function(str)
    {
        if(str==1)
        {
            //取消收藏 的显示 -1
            var count = document.getElementById("i_CollectionsCount"+blogId).innerHTML;
            count = parseInt(count);
            count=count-1;
            var count = document.getElementById("i_CollectionsCount"+blogId).innerHTML = count;
        }
        else if(str==0)
        {
            //出错什么都不做
        }
    });
}

//点赞该微博 、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、、
function agreeBlog(blogId,url,deleteUrl)
{
    var sendString = "blogId="+blogId;
    MYAjaxSubmit(url,2,sendString,function(str)
    {
        if(str==1)
        {
            var count = document.getElementById("i_AgreeCount"+blogId).innerHTML;
            count = parseInt(count);
            count=count+1;
            var count = document.getElementById("i_AgreeCount"+blogId).innerHTML = count;
        }
        else if(str==0)
        {
            //alert("您已经点赞过该篇广播,是否需要取消点赞",true,false);
            var res = confirm("您已经点赞过该篇广播,是否需要取消点赞");
            if(res==true)
            {
                //取消点赞广播
                disagreeBlog(blogId,deleteUrl);
            }
            else if(res==false)
            {
                //不取消点赞广播
            }
        }
    });
}

function disagreeBlog(blogId,url)
{
    var sendString = "blogId="+blogId;
    MYAjaxSubmit(url,2,sendString,function(str)
    {
        if(str==1)
        {
            //取消点赞 的显示 -1
            var count = document.getElementById("i_AgreeCount"+blogId).innerHTML;
            count = parseInt(count);
            count=count-1;
            var count = document.getElementById("i_AgreeCount"+blogId).innerHTML = count;
        }
        else if(str==0)
        {
            //出错什么都不做
        }
    });
}

function showTalkBigBar(task)
{
    var talkBar = document.getElementById("btt_ShowTalkBar");
    var display = talkBar.style.display;

    var baseNode = document.getElementsByName("article_id_"+task)[0];
    baseNode.appendChild(talkBar);

    if(display=="none")
    {
        talkBar.style.display = "block";
        document.getElementById("hidden_article_id").setAttribute("value",task);

        //首先获取评论数
        document.getElementById("hidden_talk_first").value = 0;
        document.getElementById("hidden_talk_count").value = 20;

        getTalks(task);
    }
    else if(display=="block")
    {
        talkBar.style.display = "none";

        //最一些清理工作
        var baseNode = document.getElementById("btt_EveryoneTalkContent");
        var nodeList = baseNode.getElementsByClassName("talk_class");

        //翻页器none
        document.getElementById("btt_PageContent").style.display="none";

        for(var i in nodeList)
        {
            baseNode.removeChild(nodeList[0]);
        }
    }
}

function getTalks(task)
{
    var url = document.getElementById("hidden_talk_show_url").value;
    var sendString = "articleId="+task+"&f="+document.getElementById("hidden_talk_first").value+"&c="+ document.getElementById("hidden_talk_count").value;

    MYAjaxSubmit(url,2,sendString,function(str)
    {
        var obj = JSON.parse(str);
        var objLength = obj.length;

        //计算一共有多少页
        var allTalksCount = obj[0]["count"]
        document.getElementById("hidden_talk_All_Count").setAttribute("value",allTalksCount) ;
        if(allTalksCount==0)
        {
            document.getElementById("btt_PageContent").style.display="none";
            return;
        }
        else
        {
            document.getElementById("btt_PageContent").style.display = "block";
        }
        var pagesCount = parseInt(allTalksCount/20);
        var pagesCount_mode = allTalksCount%20;
        pagesCount = (pagesCount_mode==0?pagesCount:pagesCount+1);
        //记录总页数 与当前页数
        document.getElementById("hidden_talk_All_Pages").value = pagesCount;
        document.getElementById("hidden_talk_Pre_Pages").value = 1;
        document.getElementById("btt_AllTalkCount").innerHTML = ""+pagesCount;

        //插入评论
        var baseNode = document.getElementById("btt_EveryoneTalkContent");
        var waitCopyNode = document.getElementById("talk_class_copy");
        //获取已经有的 talk div的数量 并且全部表现之为NONE
        var talkClassNodeList = document.getElementsByClassName("talk_class");
        var alreadyExistTalkDiv = talkClassNodeList.length;
        for(var i=0;i<talkClassNodeList.length;i++)
        {
            talkClassNodeList[i].style.display="none";
        }

        for(var i in obj)
        {
            var newNode = "";
            if(i<alreadyExistTalkDiv)
            {
                newNode = document.getElementsByClassName("talk_class")[i];
            }
            else
            {
                newNode = waitCopyNode.cloneNode(true);
                baseNode.appendChild(newNode);
            }
            newNode.style.display = "block";
            newNode.setAttribute("class","talk_class");
            newNode.getElementsByClassName("talk_nameAndSaid")[0].innerHTML = obj[i]["user_name"]+":<span style='color: black'>"+obj[i]["talk_content"]+"</span>";
            newNode.getElementsByClassName("talk_timeAnd")[0].innerHTML = getLocalTime(obj[i]["talk_time"]);
        }
    });
}

function submitTalk(url)
{
    var article_id = document.getElementById("hidden_article_id").getAttribute("value");
    var talk_content = document.getElementById("btt_InputTalkArea").value;
    var sendString = "articleId="+article_id+"&talkContent="+talk_content;

    MYAjaxSubmit(url,2,sendString,function(str)
    {
        //插入评论
        var baseNode = document.getElementById("btt_EveryoneTalkContent");
        var waitCopyNode = document.getElementById("talk_class_copy");

        var newNode = waitCopyNode.cloneNode(true);
        newNode.style.display = "block";
        newNode.setAttribute("class","talk_class");
        beforeNode = document.getElementById("talk_class_copy");
        baseNode.insertBefore(newNode,beforeNode);  //插入第一个元素之前

        newNode.getElementsByClassName("talk_nameAndSaid")[0].innerHTML = document.getElementById("iUserName").innerHTML+":<span style='color: black'>"+talk_content+"</span>";
        newNode.getElementsByClassName("talk_timeAnd")[0].innerHTML = "刚刚";

        //删除评论框中的内容
        talk_content = document.getElementById("btt_InputTalkArea").value="";
    });
}

function getLocalTime(nS)
{
    return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');
}

function showMoreTalks(mode)
{
    var allPageCount = parseInt(document.getElementById("hidden_talk_All_Pages").value);
    var prePage = parseInt(document.getElementById("hidden_talk_Pre_Pages").value);
    var userWantPage = parseInt(document.getElementById("btt_InputUserWantPage").value);
    var page = "";
    switch (mode)
    {
        case 1:page=1;break;
        case 2:page=prePage>1?prePage-1:prePage;break;
        case 3:page=userWantPage;break;
        case 4:page=prePage<allPageCount?prePage+1:prePage;break;
        case 5:page=allPageCount;break;
    }

    document.getElementById("hidden_talk_first").value=(page-1)*20;
    document.getElementById("hidden_talk_count").value=20;

    getTalks(document.getElementById("hidden_article_id").value);
}