<?php
namespace Home\Model;
use Think\Model;

class GetblogsModel extends Model\RelationModel
{
    protected $_link=array
    (
        "user"=>array
        (
            'mapping_type'=>self::BELONGS_TO,
            "foreign_key"=>"user_id",
            'mapping_name'=>'dept',
            "as_fields"=>"user_name",
        ),

    );

    public function getBlogsByID($id,$firstN=0,$countN=10)
    {
        $whereString = array
        (
            "user_id"=>$id,
        );

        $res = $this->where($whereString)->limit($firstN,$countN)->order("article_id desc")->select();
        return $res;
    }

    public function getCarePersonsBlogsByID($id,$firstN=0,$countN=10)
    {
        //一次查询 查早到所有关注的人
        $whereString = array
        (
            "user_id"=>$id,
        );
        $res = $this->table("pb_care")->where($whereString)->field("care_user_id")->select();

        //二次查询 查到时间区间内的广播
        $carePersonArray="";
        foreach($res as $key => $value)
        {
            $carePersonArray[$key]=$value["care_user_id"];
        }

        $whereString = array
        (
            "user_id"=>array("in",$carePersonArray),
        );
        $res = $this->relation(true)->where($whereString)->order("article_id desc")->limit($firstN,$countN)->select();
        return $res;
    }

    public function getCollectionBlogsByID($id,$firstN=0,$countN=10)
    {
        $data = array
        (
            "user_id"=>$id,
        );
        $res = $this->table("pb_collection")->where($data)->order("article_id desc")->limit($firstN,$countN)->field("article_id")->select();

        $collectionBlogsArray="";
        foreach($res as $key => $value)
        {
            $collectionBlogsArray[$key]=$value["article_id"];
        }

        $data = array
        (
            "article_id"=>array("in",$collectionBlogsArray),
        );
        $res = $this->relation(true)->where($data)->select();
        return $res;
    }
}