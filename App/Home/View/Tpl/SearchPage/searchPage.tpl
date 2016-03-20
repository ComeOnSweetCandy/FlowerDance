<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <title>$Title$</title>

    <link rel="stylesheet" href="__CSS__/searchPage.css">

</head>
<body>

<div id="idAllContent">
    <!--引入顶端的bar-->
    <include file="Common/topUserBar" />
    <include file="Common/topSearchDiv" />

    <div id="iScrollingAllContent">
        <div id="iScrollingLeftContent" >

            <div id="iLeftResultsContent">
                <div id="iSearchResultsNumber" style="border-bottom: 1px solid black">搜索结果为 {$searchResContent} 条</div>

                <foreach name="searchResArray" item="per">
                    <include file="Common/careTable" />
                </foreach>
                <div id="hiddenCareSomeoneStoreUrlButton" style="display: none">{:U("Careso/careUser")}</div>
                <div id="hiddenIgnoreSomeoneStoreUrlButton" style="display: none">{:U("Careso/ignoreUser")}</div>
            </div>

        </div>
        <div id="iScrollingRightContent">
            <div id="iRightHistorySearch">

            </div>
        </div>
    </div>

</div>


</body>
</html>