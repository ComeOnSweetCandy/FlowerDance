<!--发布个人微博的输入框-->
<link rel="stylesheet" href="__CSS__/submitBlogBar.css">
<script type="text/javascript" language="javascript" src="__JS__/submitBlog.js"></script>
<link rel="stylesheet" href="__CSS__/giflib.css">
<script type="text/javascript" language="javascript" src="__JS__/giflib.js"></script>

<div id="submitBlogDiv">
    <div id="iSubmitContentFirstLine">你想说些什么吗:</div>
    <div id="iSubmitContentSecondLine">
        <textarea id="iSpeakContent" maxlength="255" placeholder=""></textarea>
    </div>
    <div id="iSubmitContentThirdLine">
        <a id="giflib_showGifButton" class="__IMG__/gif/" onclick="touchShowGifButton()" style="background: url('__IMG__/gif/smil.png')"></a>
        <input id="iSubmitBlogButton" type="button" value="发布" onclick="submitYourBlog()"  />
    </div>
</div>