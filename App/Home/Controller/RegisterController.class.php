<?php
namespace Home\Controller;
use Home\Model\ConfirmModel;
use Home\Model\RegisterModel;
use Think\Controller;
use Think\Verify;

class RegisterController extends Controller
{
    public function index()
    {
        $this->display();
    }
    public function submit()
    {
        //检测是否为通过修改URL非法访问
        if(IS_POST)
        {
            $verifyRes = $this->verifyConfirm(I('post.table_confirm'));
            if(!$verifyRes)
            {
                $errorData = array
                (
                    "user_verify"=>"您输入的验证码有误",
                );
                $this->ajaxReturn($errorData,"json");
                return;
            }

            //如果合法 则将提交到数据库中
            $db = new RegisterModel('user');
            $getID = $db->register(I('post.table_name'),I('post.table_pass'),I('post.table_passConfirm'),I('post.table_email'));

            if(!$db->getError())
            {
                //注册成功 那么 然后需要在验证列表中添加一条新的数据
                //在这之前必须先获取到系统赠与用户的个人ID
                $email = I('post.table_email');
                $dbInsertConfirmInformation = new ConfirmModel("user_confirm");
                $comfirmCode =  $dbInsertConfirmInformation->insertNewUser($getID,$email);

                //发送验证邮件 到client的邮箱中
                $sendEmailContent = "您可以通过点击如下所示的链接来验证您的邮箱,成功之后,即可享受@乡野刁民带给您的橙汁服务:";
                $sendEmailContent = $sendEmailContent."<a href='http://localhost/index.php/Home/Register/confirmCode?id=".$getID."&code=".md5($email)."'>验证链接</a>";
                MYSendMail($email,$sendEmailContent);

                $this->success("注册成功,同时有一封验证邮件已经发往您的邮箱,请及时确认,稍后将为您跳转至登录页面","../Login/index",5);
            }
            else
            {
                $this->ajaxReturn( $db->getError(),"json");
            }
        }
        else
        {
            echo $this->error("非法访问.");
        }
    }

    public function confirmCode()
    {
        if(1)
        {
            $id = $_GET['id'];
            $code = $_GET['code'];

            $dbconfirm = new RegisterModel('user_confirm');
            $stringWhere = array(
                'user_id'=>$id,
                'user_confirmcode'=>$code,
            );
            $res = $dbconfirm->where($stringWhere)->select();

            //检测结果,是否验证成功,成功说明:
            $whereString = array
            (
                'user_id'=>$id,
            );
            $data = array
            (
                'user_state'=>true,
            );

            //修改用户的激活属性
            $dbuser =  new RegisterModel('user');
            $dbuser->where($whereString)->select();
            $res = $dbuser->getField('user_state');

            //检测是否已经进行了激活了
            if($res)
            {
                $this->error("该用户已经激活,请勿重复操作","http://localhost",3);
                return;
            }

            //激活进行
            $res = $dbuser->where($whereString)->save($data);
            if($res)
            {
                $this->success("已经成功激活,稍后将跳转至主页","http://localhost",3);
            }
            else
            {
                $this->error("链接已经失效,或者出现了未知的错误,请尽快通知管理员获取解决信息","http://localhost",3);
            }
        }
        else
        {

        }
    }

    public function verify()
    {
        $config = array
        (
            "useCurve"=>false,
            "useNoise"=>false,
            "bg"=>  array(1,1,1),
            "imageH"=>40,
            "imageW"=>200,
            "length"=>4,
            "fontSize"=>18,
            "reset"=>false,
        );

        $verify = new Verify($config);
        $verify->entry(1);
    }

    public function verifyConfirm($code)
    {
        $id="1";
        $verify = new Verify();
        return $verify->check($code,$id);
    }
}