<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        FBalertWindow("欢迎来到错误的INDEX页面");
    }
}