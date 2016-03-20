<style>
    #lm_LoadMoreDiv
    {
        width: 655px;
        height: 40px;
        margin: 10px 10px;
        padding: 0px;
        border: none;
        border-radius: 3px;
        position: relative;
        background-color: red;
        text-align: center;
        line-height: 40px;
    }
    #lm_LoadMoreDiv #lm_LoadMoreButton
    {
        width: 655px;
        height: 100%;
        background-color: #00ee00;
        border: none;
        line-height: 40px;
        font-size: 17px;
    }
</style>

<script type="text/javascript" language="javascript" src="__JS__/myPublicFunction.js"></script>
<script>
    function loadMoreBlogs()
    {
        var pageMode = document.getElementById("smp_HiddenPageMode").innerHTML;
        var baseNode = document.getElementById("hiddenBlogsInfo");
        var firstBlog = baseNode.getElementsByTagName("span")[0].innerHTML;
        var blogsCount = baseNode.getElementsByTagName("span")[1].innerHTML;
        var url =  baseNode.getElementsByTagName("span")[2].innerHTML;
        var sendString = "firstBlog="+firstBlog+"&blogsCount="+blogsCount+"&pageMode="+pageMode;
        console.log(sendString);

        document.getElementById("lm_LoadMoreDiv").innerHTML="加载中......";

        MYAjaxSubmit(url,2,sendString,function(str)
        {
            addBlogsBar(str);
        });
    }
</script>

<div id="hiddenBlogsInfo" style="display: none"><span>{$pageInfo.firstBlog}</span><span>{$pageInfo.blogsCount}</span><span>{:U("showMoreBlogs")}</span></div>
<div id="lm_LoadMoreDiv">
    <input id="lm_LoadMoreButton" type="button" value="加载更多" onclick="loadMoreBlogs()">
</div>