<?php
namespace Home\Model;
use Think\Model;

class SubmitBlogModel extends Model
{
    protected $_validate = array
    (
        array("article_content","require","所写微博内容不能为空."),
    );

    public function submitBlog($blogContent)
    {
        $t = time();
        $data = array
        (
            "article_content"=>$blogContent,
            "user_id"=>session("id"),
            "article_agree"=>0,
            "article_talk"=>0,
            "article_collection"=>0,
            "article_time"=>date("Y-m-d H:i:s",$t),
        );

        if($this->create($data))
        {
            $res = $this->add();
            if($res)
            {
                return $res;
            }
            else
            {
                return 0;
            }
        }
        else
        {
            return 0;
        }
    }

    public function deleteBlog($blogID)
    {
        $data = array
        (
            "article_id"=>$blogID,
        );

        return $this->where($data)->delete();
    }
}