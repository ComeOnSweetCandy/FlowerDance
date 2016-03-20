<?php
namespace Home\Controller;
use Home\Model\CaresoModel;
use Home\Model\CollectBlogsModel;
use Home\Model\GetblogsModel;
use Home\Model\LoginModel;
use Think\Controller;

class OtherPersonPageController extends Controller
{
    public function displayPage()
    {
        //首先 检测 该用户 是否已经对其添加过了关注
        $yourId = session("id");
        $yourName = session("name");
        $userId = I("get.userID");

        if(!isset($yourId))
        {
            //还未登录
            $this->error("您还没有登录微博,请先登录","../Login/index",3);
        }
        if(!isset($userId))
        {
            //还未登录
            $this->error("发生未知错误或者用户进行了非法操作",3);
        }
        if($yourId==$userId)
        {
            $this->success("稍后将为您跳转至您的主页","../BlogMainPage/showMainPage");
            return ;
        }

        //查询个人信息列表
        $userDb = new LoginModel("user");
        $userAllInfo = $userDb->getUserAllInfo($userId);

        //防止非法操作
        if($userAllInfo==null)
        {
            //还未登录
            $this->error("发生未知错误或者用户进行了非法操作",3);
        }

        //查询关注列表
        $careDb = new CaresoModel("care");
        $res = $careDb->isCare($yourId,$userId);
        $isCare = $res?1:0;

        //获取BLOGs
        $blogsDb = new GetblogsModel("article");
        $blogs = $blogsDb->getBlogsByID($userId);

        //这里将需要的数据装入数组之中
        $pageInfo = array
        (
            "pageModel"=>2,  //2为他人主页 1为本人主页
            "isCare"=>$isCare //是否已经关注过该人
        );
        $yourInfo = array
        (
            "user_name"=>$yourName,
            "user_id"=>$yourId,
        );

        //显示其他用户的主页
        $this->assign("pageInfo",$pageInfo);
        $this->assign("yourInfo",$yourInfo);
        $this->assign("userInfo",$userAllInfo);
        $this->assign("user_blogs",$blogs);
        $this->display();
    }

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

    public function collectBlog()
    {
        $yourId = session("id");
        $blogId = I("post.blogId");

        //先行判定是否已经收藏过了
        $collectionDb = new CollectBlogsModel("collection");
        $res = $collectionDb->isCollect($blogId);

        if($res==1)
        {
            //已经收藏过了 提问用户是否需要取消收藏
            $this->ajaxReturn(0);
        }
        else if($res==0)
        {
            $collectionDb = new CollectBlogsModel("collection");
            $res = $collectionDb->collectBlog($yourId,$blogId);

            $collectionDb1 = new CollectBlogsModel("article");
            $res = $collectionDb1->addBlogCollections($blogId);

            //成功收藏 返回成功消息
            $this->ajaxReturn(1);
        }
    }

    public function discollectBlog()
    {
        $yourId = session("id");
        $blogId = I("post.blogId");

        //先行判定是否已经收藏过了
        $collectionDb = new CollectBlogsModel("collection");
        $res = $collectionDb->isCollect($blogId);

        if($res==1)
        {
            //已经收藏过了 可以取消收藏
            $collectionDb = new CollectBlogsModel("collection");
            $res = $collectionDb->discollectBlog($yourId,$blogId);

            $collectionDb1 = new CollectBlogsModel("article");
            $res = $collectionDb1->deleteBlogCollections($blogId);

            //成功收藏 返回成功消息
            $this->ajaxReturn(1);
        }
        else if($res==0)
        {
            //还没有收藏过
            $this->ajaxReturn(0);
        }
    }

    public function agreeBlog()
    {
        $yourId = session("id");
        $blogId = I("post.blogId");

        //先行判定是否已经点赞过了
        $collectionDb = new CollectBlogsModel("agree");
        $res = $collectionDb->isCollect($blogId);

        if($res==1)
        {
            //已经点赞过了 提问用户是否需要取消收藏
            $this->ajaxReturn(0);
        }
        else if($res==0)
        {
            $collectionDb = new CollectBlogsModel("agree");
            $res = $collectionDb->collectBlog($yourId,$blogId);

            $collectionDb1 = new CollectBlogsModel("article");
            $res = $collectionDb1->addBlogAgree($blogId);

            //成功收藏 返回成功消息
            $this->ajaxReturn(1);
        }
    }

    public function disagreeBlog()
    {
        $yourId = session("id");
        $blogId = I("post.blogId");

        //先行判定是否已经点赞过了
        $collectionDb = new CollectBlogsModel("agree");
        $res = $collectionDb->isCollect($blogId);

        if($res==1)
        {
            //已经点赞过了 可以取消点赞
            $collectionDb = new CollectBlogsModel("agree");
            $res = $collectionDb->discollectBlog($yourId,$blogId);

            $collectionDb1 = new CollectBlogsModel("article");
            $res = $collectionDb1->deleteBlogAgree($blogId);

            //成功点赞 返回成功消息
            $this->ajaxReturn(1);
        }
        else if($res==0)
        {
            //还没有点赞过
            $this->ajaxReturn(0);
        }
    }
}