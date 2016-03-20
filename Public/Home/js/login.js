var rightBarWidth; //滚动条的宽度

$(function()
{
    //计算出右边滚动条的宽度
    calculateRightBarWidth();

    changeAllContentPosition();

    changeBodyWidth();

    changeBodyHeight();

});

$(window).resize(function()
{
    changeAllContentPosition();
});

//改变右方方框的位置
function changeAllContentPosition()
{
    //获取当前的屏幕高度 做出一些适配性
    //var clientScreenHeight = document.documentElement.clientHeight;
    var clientScreenHeight = document.documentElement.clientHeight;
    //获取右方方框的高度
    var boxHeight = $('#iAllContent').css('height');
    //计算方框应该被放置的margin-top值
    var marginTopVal = (clientScreenHeight - parseInt(boxHeight))/2;
    //赋值给方框
    $('#iAllContent').css('margin-top',marginTopVal);
}

//修改body宽度和页面高度
function changeBodyWidth()
{
    //获取当前的屏幕宽度 做出一些body适配
    //var clientScreenWidth =  document.documentElement.clientWidth;
    var clientScreenWidth = window.screen.width;
    $('body').css('width', clientScreenWidth-rightBarWidth);

    //初始化时 底层背景图片的宽度等于整个屏幕的宽度
    $('#backgroundImg').css('width', clientScreenWidth-rightBarWidth);
}

//修改body高度和页面高度
function changeBodyHeight()
{
    var clientScreenHeight = window.screen.availHeight;
    if(clientScreenHeight<630)
    {
        clientScreenHeight=630;
    }
    $('body').css('height', clientScreenHeight);
    $('html').css('height', clientScreenHeight);
    $('#footer').css('top',clientScreenHeight-30);
}

function calculateRightBarWidth()
{
    //获取滚动条的宽度 是的
    var innerWidth = document.body.clientWidth;
    var outWidth;
    if(window.innerWidth)
    {
        outWidth = window.innerWidth;
    }
    else
    {
        outWidth = $('html').css('width');
    }
    rightBarWidth = parseInt(outWidth)-parseInt(innerWidth);
}

document.ready = function()
{

}

window.onload = function ()
{
    //初始设置
    $('#idTopRedOrGreen').fadeOut(0);

    document.getElementById("idRegisterButton").onclick=function()
    {
        var hrefString = "http:/Home/Register/index";
        location.href = hrefString;
    }

    document.getElementById("idLoginButton").onclick = function()
    {
        var data = "";
        var data = data + "email=" + document.getElementById("idUserEmail").value + "&";
        var data = data + "password=" + document.getElementById("idUserPassword").value;

        var newUrl = document.getElementById("idLoginButton").getAttribute("name");
        console.log(newUrl);
        MYAjaxSubmit(newUrl,2,data,function(str)
        {
            //通过最下方的 提示条来进行提示 登录的结果
            if(str==0)
            {
                $('#idTopRedOrGreen').html("登录成功,稍后将为您跳转至微博主页面.");
                $('#idTopRedOrGreen').css("background-color","green");
                $('#idTopRedOrGreen').fadeIn(0);
                location.href = "/index.php/BlogMainPage/showMainPage";
            }
            else if(str==1)
            {
                $('#idTopRedOrGreen').html("密码错误导致,登录失败,请您重新输入正确的密码.");
                $('#idTopRedOrGreen').css("background-color","red");
                $('#idTopRedOrGreen').fadeIn(0);
            }
            else
            {
                $('#idTopRedOrGreen').html("登录失败,该用户不存在,请输入正确的用户名.");
                $('#idTopRedOrGreen').css("background-color","red");
                $('#idTopRedOrGreen').fadeIn(0);
            }
        });
    }

    //当密码框和邮箱框获取焦点时
    document.getElementById("idUserEmail").onfocus = function(){disapperErrorDiv()};
    document.getElementById("idUserPassword").onfocus = function(){disapperErrorDiv()};
}

function disapperErrorDiv()
{
    $('#idTopRedOrGreen').fadeOut(0);
}

