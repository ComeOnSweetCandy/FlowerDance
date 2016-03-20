<?php
namespace Home\Model;
use Think\Model;

class CollectBlogsModel extends Model
{
    public function isCollect($blogId)
    {
        $data = array
        (
            "article_id"=>$blogId,
        );
        return $this->where($data)->count();
    }

    public function collectBlog($userId,$blogId)
    {
        $data = array
        (
            "user_id"=>$userId,
            "article_id"=>$blogId,
        );

        return $this->add($data);
    }

    public function discollectBlog($userId,$blogId)
    {
        $data = array
        (
            "user_id"=>$userId,
            "article_id"=>$blogId,
        );

        return $this->where($data)->delete();
    }

    public function deleteBlogCollections($blogId)
    {
        $data = array
        (
            "article_id"=>$blogId,
        );
        return $this->where($data)->setDec("article_collection");
    }

    public function addBlogCollections($blogId)
    {
        $data = array
        (
            "article_id"=>$blogId,
        );
        return $this->where($data)->setInc("article_collection");
    }

    public function deleteBlogAgree($blogId)
    {
        $data = array
        (
            "article_id"=>$blogId,
        );
        return $this->where($data)->setDec("article_agree");
    }

    public function addBlogAgree($blogId)
    {
        $data = array
        (
            "article_id"=>$blogId,
        );
        return $this->where($data)->setInc("article_agree");
    }
}