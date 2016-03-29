

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

    var currentImg = 1;
    var inter = window.setInterval(function(){switchBackImg((currentImg++)%4,currentImg)},4000);


}

function testR()
{
    alert("fe");
}

function disapperErrorDiv()
{
    $('#idTopRedOrGreen').fadeOut(0);
}

var timeIntervalHandle;
function switchBackImg(task,curr=-1)
{
    if(curr==-2)
    {
        //非默认形态
        var timeInterval = 1000; //总计的时间

        var left = document.getElementById("imgWall5");
        var right = document.getElementById("imgWall6");
        left.style.background="url('../Public/Home/img/test/1.jpg')";
        right.style.background="url('../Public/Home/img/test/2.jpg')";

        left.style.width="600px";
        left.style.left="0px";
        right.style.width="0px";
        left.style.display="block";
        right.style.display="block";

        var times=1000;
        var count =1000/16;
        var every = 600/count;
        var times= 1;
        for(var ic = 0 ; ic<count ; ic++)
        {
            setTimeout(function()
            {
                transition(times++,count,every);
            },ic*16);
        }

    }

    var currentImg = document.getElementById("hidden_CurImg").innerHTML;
    currentImg = parseInt(currentImg);
    task = parseInt(task);

    document.getElementsByClassName("imgWall")[currentImg].style.zIndex=0
    document.getElementsByClassName("imgWall")[task].style.zIndex=1;
    document.getElementById("hidden_CurImg").innerHTML = task;

    document.getElementsByClassName("switchBackImgButton")[currentImg].style.color="white";
    document.getElementsByClassName("switchBackImgButton")[task].style.color="red";
}

var lll=600;
function transition(pre,count,every)
{
    var left = document.getElementById("imgWall5");
    var right = document.getElementById("imgWall6");


    var lwidth = 600-pre*every;
    var rwidth = pre*every;

    console.log(lwidth);
    console.log(rwidth);


    left.style.left="-"+rwidth+"px";
    right.style.width=rwidth+"px";
}
