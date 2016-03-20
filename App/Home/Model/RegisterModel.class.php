<?php
namespace Home\Model;
use Think\Model;

class RegisterModel extends Model
{
    //开启批量验证
    protected $patchValidate = true;

    //自动完成
    protected $_auto = array
    (
        array("user_pass",'sha1',self::MODEL_BOTH,'function'),
        array('create','time',self::MODEL_INSERT,'function'),
    );

    protected $_validate = array
    (
        array('user_name','4,16','账号长度不合法',self::EXISTS_VALIDATE,'length'),
        array('user_pass','6,20','密码长度不合法',self::EXISTS_VALIDATE,'length'),
        array('user_pass','user_pass_confirm','两次输入的密码不相等',self::EXISTS_VALIDATE,'confirm'),
        array('user_email','email','邮箱格式不正确',self::EXISTS_VALIDATE),
        array('user_email','','该邮箱已经用于过注册',self::EXISTS_VALIDATE,'unique',self::MODEL_INSERT),

    );

    public function register($name,$pass,$passConfirm,$email)
    {
        $data = array
        (
            'user_name'=>$name,
            'user_pass'=>$pass,
            'user_email'=>$email,
            'user_pass_confirm'=>$passConfirm,
        );

        if($this->create($data))
        {
            return $this->add();
        }
        else
        {
            return false;
        }
    }
}