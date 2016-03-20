var rightBarWidth; //滚动条的宽度

$(function()
{
    //登录页背景随机
    //var rand = Math.floor(Math.random()*5+1);
    //$('body').css('background','url('+ThinkPHP['IMG']+'/1.jpg) no-repeat').css('background-size','100%');
    //$("#login input[type = 'submit']").button();

    //计算出右边滚动条的宽度
    calculateRightBarWidth();

    changeBodyWidth();

    changeBodyHeight();

});

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

//修改body宽度和页面高度
function changeBodyWidth()
{
    //获取当前的屏幕宽度 做出一些body适配
    //var clientScreenWidth =  document.documentElement.clientWidth;
    var clientScreenWidth = window.screen.width;
    $('body').css('width', clientScreenWidth-rightBarWidth);

    //初始化时 底层背景图片的宽度等于整个屏幕的宽度
    $('#backgroundImg').css('width', clientScreenWidth-rightBarWidth);
    $('#iAllContent').css('width', clientScreenWidth-rightBarWidth);
}

//修改body高度和页面高度
function changeBodyHeight()
{
    var clientScreenHeight = window.screen.availHeight;
    $('body').css('height', clientScreenHeight);
    $('html').css('height', clientScreenHeight);
    //初始化时 底层背景图片的宽度等于整个屏幕的宽度
    $('#backgroundImg').css('height', clientScreenHeight);
    $('#iAllContent').css('height', clientScreenHeight);
    $('#backgroundImg2').css('height', clientScreenHeight);
    $('#backgroundImg2').css('top', clientScreenHeight);
}

window.onload=function()
{
    //当submit按钮按下的时候
    var submitButton = document.getElementById('postRegisterMessageButton');
    submitButton.onclick=function()
    {
        submitButtonClick();
    };
}

function submitButtonClick()
{
    //获取表单中的所有需要的信息，同时进行一些检测 看是否合法
    //var submitString ="type=submit";
    var submitString="";

    var count = document.getElementById("iRegisterTable").firstElementChild.children.length;
    var childNodes = document.getElementById("iRegisterTable").firstElementChild.getElementsByTagName("input");
    for(var i=0;i<count;i++)
    {
        submitString = submitString + childNodes[i].name+"="+childNodes[i].value + "&";
    }
    submitString = submitString + "type=submit";

    //这里是发送post请求的函数
    MYAjaxSubmit("submit",2,submitString,function(str)
    {
        document.write(str);
    });
}

function changeVerify()
{
    var verifyUrl = document.getElementById("iVerifyImg").getAttribute("src");
 console.log(verifyUrl);
    document.getElementById("iVerifyImg").setAttribute("src",verifyUrl);
}
