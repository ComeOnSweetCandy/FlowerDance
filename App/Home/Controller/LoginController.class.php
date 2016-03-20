<?php
namespace Home\Controller;
use Home\Model\LoginModel;
use Think\Controller;

class LoginController extends Controller
{
    public function index()
    {
        $this->display();
    }

    public function confirmLoginAction()
    {
        //验证用户邮箱和密码 是否允许登录
        $loginConfirm  = new LoginModel("user");
        $res = $loginConfirm->loginConfrim(I("email"),I("password"));

        if($res==0)
        {
        }

        $this->ajaxReturn($res);
    }
}