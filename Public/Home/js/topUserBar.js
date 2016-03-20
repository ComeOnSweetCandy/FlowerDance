function searchForSomeoneOrBlog()
{
    var searchContent =  document.getElementById("iSearchInput").value;
    var searchButtonUrl = document.getElementById("iSearchButton")["name"];
    var searchString = "searchContent="+searchContent;
    searchButtonUrl=searchButtonUrl+"?"+searchString;
    window.location.href =searchButtonUrl;

    //MYAjaxSubmit(searchButtonUrl,1,searchString,function(str)
    //{
    //    document.write(str);
    //});
}

//用户退出
function exitUser()
{

}
