<?php
/*
 该页面用于用户的邮箱验证
 */

namespace Home\Model;
use Think\Model;

class ConfirmModel extends Model
{
    public function insertNewUser($id,$email)
    {
        //在邮箱认证数据表中插入一项新的数据 用于用户验证自己的邮箱
        $id;
        $confirmCode = md5($email);

        $data = array
        (
            'user_id'=>$id,
            'user_confirmcode'=>$confirmCode,
        );

        $this->add($data);
        return $confirmCode;
    }

}