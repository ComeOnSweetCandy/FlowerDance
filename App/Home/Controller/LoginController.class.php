<?php
namespace Home\Controller;
use Home\Model\LoginModel;
use Think\Controller;

class LoginController extends Controller
{
    public function index()
    {
        $this->display();

        //记录访问
        $ip = get_client_ip(0);
        $time = time();
        $loginDb = new LoginModel("access");
        $loginDb->addAccess($ip,$time);
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