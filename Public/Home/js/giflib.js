
//全局信息
var isOpened = false;
var gifCount = 132; //总共的gif图片计数

function touchShowGifButton()
{
    if(!isOpened)
    {
        //当前还未打开 首先检测是否存在该div了已经
        var existNode = document.getElementById("giflib_gifBar");
        isOpened=true;
        if(existNode==null)
        {
            createGifDiv(); //创造一个div
        }
        else
        {
            //如果存在了 只需要将其显示出来就好了 同时获取焦点
            existNode.style.display = "block";
            existNode.focus();
        }
    }
}

//创造一个DIV
function createGifDiv()
{
    //加入DOM
    var baseNode = document.getElementById("giflib_showGifButton");
    var newNode = document.createElement("div");
    newNode.id = "giflib_gifBar";
    newNode.tabIndex = "0";
    newNode.hidefocus="true";
    baseNode.appendChild(newNode);

    //添加入表情
    addGifBag(newNode);

    //得到焦点,如果按了 GIF DIV之外的内容,触发失去焦点,隐藏DIV
    newNode.focus();
    newNode.onblur = function(){newNode.style.display="none";isOpened=false};
}

function addGifBag(newNode)
{
    //这里放入两个最大的DIV盒子
    var topDiv = document.createElement("div");
    topDiv.id = "giflib_topBar";
    var centerDiv = document.createElement("div");
    centerDiv.id = "giflib_centerBar";

    //往中间的盒子中插入所有的表情
    addAllGif(centerDiv);

    //往顶端盒子中插入标签
    addLabel(topDiv);

    //插入DOM树
    newNode.appendChild(topDiv);
    newNode.appendChild(centerDiv);
}

function addLabel(topDiv)
{
    var newNode = document.createElement("div");
    newNode.id = "giflib_firstButton";
    newNode.innerHTML = "默认"
    topDiv.appendChild(newNode);
}

function addAllGif(centerNode)
{
    for(var i =1 ; i <=gifCount ; i++)
    {
        var newImage = document.createElement("img");
        var url = document.getElementById("giflib_showGifButton").getAttribute("class");
        newImage.src = url+""+i+".gif";
        newImage.class = "giflib_imageArrayClass";
        newImage.id = i;
        newImage.onclick = function()
        {
            insertGif(this.id);
        };

        centerNode.appendChild(newImage);
    }
}

function insertGif(imageId)
{
    //传过来的是字符串 处理一下.
    //document.getElementById("text").value = imageId;

    imageId="[@"+imageId+"@]";
    var d = document.getElementById("iSpeakContent");

    insertText(d,imageId);
}

function insertText(obj,str)
{
    if (document.selection)
    {
        var sel = document.selection.createRange();
        sel.execCommand("bold");
    }
    else if (typeof obj.selectionStart === 'number' && typeof obj.selectionEnd === 'number')
    {
        var startPos = obj.selectionStart;
        var endPos = obj.selectionEnd;
        var cursorPos = startPos;
        var tmpStr = obj.value;

        obj.value = tmpStr.substring(0, startPos) + str + tmpStr.substring(endPos, tmpStr.length);
        cursorPos += str.length;
        obj.selectionStart = obj.selectionEnd = cursorPos;
    }
    else
    {
        obj.value += str;
    }
}
function moveEnd(obj)
{
    obj.focus();
    var len = obj.value.length;
    if (document.selection)
    {
        var sel = obj.createTextRange();
        sel.moveStart('character',len);
        sel.collapse();
        sel.select();
    }
    else if (typeof obj.selectionStart == 'number' && typeof obj.selectionEnd == 'number')
    {
        obj.selectionStart = obj.selectionEnd = len;
    }
}