<?php
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