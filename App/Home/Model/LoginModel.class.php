<?php
namespace Home\Model;
use Think\Model;

class LoginModel extends Model
{
    public function loginConfrim($email,$password)
    {
        $dataAcount = array
        (
            "user_email"=>$email,
        );
        $data = array
        (
            "user_email"=>$email,
            "user_pass"=>sha1($password),
        );

        $res = $this->where($dataAcount)->select();

        if($res)
        {
            //如果账号存在的话
            $res = $this->where($data)->select();

            if($res)
            {
                //如果输入的账号密码都正确的话
                session("id",$res[0]['user_id']);
                session("name",$res[0]['user_name']);
                session("email",$res[0]['user_email']);
                session("care",$res[0]["user_care"]);
                session("listener",$res[0]["user_listener"]);
                cookie("name",$res[0]['user_id']);

                return 0;
            }
            else
            {
                //输入的密码错误的话
                return 1;
            }
        }
        else
        {
            //如果该账号不存在
            return 2;
        }
    }

    public function getUserAllInfo($userId)
    {
        $data  = array
        (
            "user_id"=>$userId,
        );
        return $this->where($data)->find();
    }

    public function addAccess($ip,$time)
    {
        $data = array
        (
            "access_ip"=>$ip,
            "access_time"=>$time,
        );
        $this->add($data);
    }
}