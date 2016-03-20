<?php
namespace Home\Controller;
use Home\Model\CaresoModel;
use Think\Controller;

class CaresoController extends Controller
{
    public function careUser()
    {
        $userId = session("id");
        $careUserId = I("post.user_id");

        //这里在关注列表中 插入一行写的数据
        $careDb = new CaresoModel("care");
        $res =$careDb->careUser($userId,$careUserId);

        if($res)
        {
            $careDb1 = new CaresoModel("user");
            //1为增加 2为减少
            $careDb1->updateUserList($userId,$careUserId,1);
        }
        else
        {
            //重复关注了
            var_dump("你TM的重复关注干嘛.");
        }
        //修改user表中的关注与被关注
    }

    public function ignoreUser()
    {
        $userId = session("id");
        $careUserId = I("post.user_id");

        //这里在关注列表中 插入一行写的数据
        $careDb = new CaresoModel("care");
        $res =$careDb->ignoreUser($userId,$careUserId);

        if($res)
        {
            $careDb1 = new CaresoModel("user");
            //1为增加 2为减少
            $careDb1->updateUserList($userId,$careUserId,2);
        }
        else
        {
            //重复关注了
            var_dump("你TM的重复取关干嘛.");
        }
        //修改user表中的关注与被关注
    }
}