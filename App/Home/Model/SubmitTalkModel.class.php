<?php
namespace Home\Model;
use Think\Model;

class SubmitTalkModel extends Model
{
    public function submitTalk($talkContent,$user_id,$user_name,$article_id)
    {
        $data = array
        (
            "article_id"=>$article_id,
            "user_id"=>$user_id,
            "user_name"=>$user_name,
            "talk_content"=>$talkContent,
            "talk_time"=>time(),
        );

        return $this->add($data);
    }

    public function getTalk($articleId,$f,$c)
    {
        $data = array
        (
            "article_id"=>$articleId,
        );
        return $this->where($data)->limit($f,$c)->order("talk_id desc")->select();
    }

    public function getTalkCount($articleId)
    {
        $data = array
        (
            "article_id"=>$articleId,
        );
        return $this->where($data)->count();
    }
}