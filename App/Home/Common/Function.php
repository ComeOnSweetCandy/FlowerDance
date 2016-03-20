<?php

require("smtp.php");

function FBalertWindow($sendMessage=NULL)
{
    $inMessage="";
    if(!isset($sendMessage))
    {
        $inMessage="默认条目";
    }
    else
    {
        $inMessage=$sendMessage;
    }
    echo "<h1 align='center' style='color: red'>".$inMessage."</h1>";
}

function MYSendMail($recvMail,$sendContent)
{
//使用163邮箱服务器
    $smtpserver = "smtp.163.com";
//163邮箱服务器端口
    $smtpserverport = 25;
//你的163服务器邮箱账号
    $smtpusermail = "dingyukun_2008@163.com";
//收件人邮箱
    $smtpemailto = $recvMail;
//你的邮箱账号(去掉@163.com)
    $smtpuser = "dingyukun_2008";//SMTP服务器的用户帐号
//你的邮箱密码
    $smtppass = "Woaishaman7"; //SMTP服务器的用户密码
//邮件主题
    $mailsubject = "来自乡野刁民的验证邮件";
//邮件内容
    $mailbody = $sendContent;
//邮件格式（HTML/TXT）,TXT为文本邮件
    $mailtype = "HTML";
//这里面的一个true是表示使用身份验证,否则不使用身份验证.
    $smtp = new smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass);
//是否显示发送的调试信息
    $smtp->debug = TRUE;
//发送邮件
    $result = $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
}
