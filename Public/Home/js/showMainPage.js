
window.onload = function()
{
    transformTextToGif();

    function transformTextToGif()
    {
        //解决兼容性问题
        if (!document.getElementsByClassName)
        {
            document.getElementsByClassName = function (className,element=null)
            {
                var children = (element || document).getElementsByTagName('*');
                var elements = new Array();
                for (var i = 0; i < children.length; i++)
                {
                    var child = children[i];
                    var classNames = child.className.split(' ');
                    for (var j = 0; j < classNames.length; j++)
                    {
                        if (classNames[j] == className)
                        {
                            elements.push(child);
                            break;
                        }
                    }
                }
                return elements;
            };
        }

        //获取所有的class
        var url  =document.getElementById("btt_GifBagUrl").value;
        var nodeList = document.getElementsByClassName("cTextContent");

        for(var i =0 ;i<nodeList.length;i++)
        {
            var string = nodeList[i].innerHTML;
            var reg = new RegExp("[\[]{1}@[0-9]*@]","g");
            var stringArray ="";
            var imgArray  = new Array(0);

            while(( stringArray = reg.exec(string))!=null)
            {
                var singleImg =new Array(3);
                singleImg[0]=stringArray[0];
                singleImg[1]=stringArray["index"];
                singleImg[2]=reg.lastIndex;
                imgArray.push(singleImg);
            }
            for(var x in imgArray)
            {
                var number = imgArray[x][0].match(/[0-9]+/);
                number = parseInt(number[0]);

                var imgUrl = "<img src='"+url+number+".gif"+"' style='width:20px;height:20px;'/>";

                string = string.replace(imgArray[x][0],imgUrl);
            }
            nodeList[i].innerHTML=string;
        }
    }
}

function getMyselfArticle()
{
    var sendString = "";
    //这里是发送post请求的函数
    MYAjaxSubmit("getMySelfText",2,sendString,function(str)
    {
        document.write(str);
    });
}

function resetSign(url)
{
    var send = "";
    MYAjaxSubmit(url,2,send,function(str)
    {
        var obj = JSON.parse(str);
        var string = obj[0]["user_sign"];
        document.getElementById("iUserSingText").value = obj[0]["user_sign"];
    });
}

function changeSign(url)
{
    var sendContent = document.getElementById("iUserSingText").value;
    var send = "newSign="+sendContent;
    MYAjaxSubmit(url,2,send,function(str)
    {
        alert("修改个人签名成功.")
    });
}