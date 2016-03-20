<?php
namespace Home\Model;
use Think\Model;

class CaresoModel extends Model\RelationModel
{
    protected $_link = array
    (
        "care"=>array
        (
            "mapping_type"=>self::HAS_ONE,
            "foreign_key"=>"care_user_id",
            "condition"=>"",
            "mapping_name"=>"care",
            "as_fields"=>"user_id:the_true_user_id",
            "mapping_fields"=>"user_id",
        ),
    );

    public function careUser($user_id,$care_user_id)
    {
        $data = array
        (
            "user_id"=>$user_id,
            "care_user_id"=>$care_user_id,
        );

        if($this->where($data)->select())
        {
            return false;
        }
        return $this->add($data);
    }

    public function ignoreUser($user_id,$care_user_id)
    {
        $data = array
        (
            "user_id"=>$user_id,
            "care_user_id"=>$care_user_id,
        );

        if($this->where($data)->select())
        {
            return $this->where($data)->delete();
        }
        return false;
    }

    public function updateUserList($userId,$careUserId,$way=1)
    {
        $whereString1 = array
        (
            "user_id"=>$userId,
        );
        $whereString2 = array
        (
            "user_id"=>$careUserId,
        );

        if($way==1)
        {
            $this->where($whereString1)->setInc("user_care");
            $this->where($whereString2)->setInc("user_listener");
        }
        else if($way == 2)
        {
            $this->where($whereString1)->setDec("user_care");
            $this->where($whereString2)->setDec("user_listener");
        }
    }

    public function searchCareList($userId,$first=0,$count=10)
    {
        //是用子查询？
        $data1 = array
        (
            "user_id"=>$userId,
        );
        $newSql = $this->table("pb_care")->where($data1)->field('care_user_id')->select();

        if(sizeof($newSql)==0)
        {
            //我没有人关注任何人,直接退出
            return null;
        }

        $careIdArray=NULL;
        foreach($newSql as $key => $value)
        {
            $careIdArray[$key] = $value["care_user_id"];
        }
        $data2['user_id'] = array("in",$careIdArray);
        $res = $this->where($data2)->limit($first,$count)->select();
        foreach($res as $key => $value)
        {
            $res[$key]["the_true_user_id"] = $userId;
        }
        return $res;
    }

    public function countCare($userId)
    {
        $data1 = array
        (
            "user_id"=>$userId,
        );
        return $this->table("pb_care")->where($data1)->count();
    }

    public function searchListenerList($userId,$first=0,$count=10)
    {
        //用关联查询
        $this->_link["care"]["condition"]="user_id=".$userId;

        $data1 = array
        (
            "care_user_id"=>$userId,
        );
        $newSql = $this->table("pb_care")->where($data1)->field('user_id')->select();

        if(sizeof($newSql)==0)
        {
            //没有人关注我,直接退出
            return null;
        }

        $careIdArray=NULL;
        foreach($newSql as $key => $value)
        {
            $careIdArray[$key] = $value["user_id"];
        }
        $data2['user_id'] = array("in",$careIdArray);
        $res = $this->relation(true)->where($data2)->limit($first,$count)->select();

        return $res;
    }

    public function countListener($userId)
    {
        $data1 = array
        (
            "care_user_id"=>$userId,
        );
        return $this->table("pb_care")->where($data1)->count();
    }

    public function isCare($yourId,$userId)
    {
        $data = array
        (
            "user_id"=>$yourId,
            "care_user_id"=>$userId,
        );
        return $this->where($data)->find();
    }
}