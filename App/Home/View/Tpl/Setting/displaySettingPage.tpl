<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户个人设定</title>

    <link rel="stylesheet" href="__CSS__/mainPage.css">
    <link rel="stylesheet" href="__CSS__/settingPage.css">
    <script type="text/javascript" language="javascript" src="__JS__/settingPage.js"></script>

</head>
<body>

<div id="idAllContent">
    <!--引入顶端的bar-->
    <include file="Common/topUserBar" />
    <div id="settingPageAllContent">
        <div id="settingImageContent">
            <div id="dsp_ImageBar">
                <img id="dsp_UserImage" src="__IMG__/icon/agree.jpg" name="__UPLOAD__">
            </div>
            <div id="dsp_ImageRightBar">
                <form id="form" method="post" action="{:U('Setting/Upload')}" enctype="multipart/form-data" target="result_frame">
                    <span id="spanModel"></span>
                    <a>选择图片<input type="file" id="uploadContent" name="文件上传" /></a>
                    <input type="submit" id="uplodaButton" value="上传">
                </form>
            </div>
        </div>
    </div>
<div>

    <iframe id="uploadframe" name="result_frame" style="display: none"></iframe>

</body>
</html>