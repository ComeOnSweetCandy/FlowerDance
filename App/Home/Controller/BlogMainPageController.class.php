<?php
namespace Home\Controller;
use Home\Model\GetblogsModel;
use Home\Model\LoginModel;
use Home\Model\SubmitBlogModel;
use Home\Model\SubmitTalkModel;
use Think\Controller;

class BlogMainPageController extends Controller
{
    public function showMainPage($pageMode=1)
    {
        $user_id = session("id");
        $userDb = new LoginModel("user");
        $yourInfo = $userDb->getUserAllInfo($user_id);

        $blogsDB=NULL;
        $blogs=NULL;
        if($pageMode==1)
        {
            //个人微博页的时候返回的微博数
            $blogsDB = new GetblogsModel("article");
            $blogs = $blogsDB->getBlogsByID($user_id);
        }
        else if($pageMode==3)
        {
            //关注的人的微博
            $blogsDB_care = new GetblogsModel("article");
            $blogs = $blogsDB_care->getCarePersonsBlogsByID($user_id);
        }
        else if($pageMode==4)
        {
            //收藏的微博
            $blogsDB_care = new GetblogsModel("article");
            $blogs = $blogsDB_care->getCollectionBlogsByID($user_id);
        }

        $pageInfo = array
        (
            "pageMode"=>$pageMode,  //2为他人主页 1为本人主页 3为关注模式 4为收藏模式
            "firstBlog"=>10,
            "blogsCount"=>10,
        );

        if(isset($user_id))
        {
            $this->assign("pageInfo",$pageInfo);
            $this->assign("yourInfo",$yourInfo);
            $this->assign("userInfo",$yourInfo);
            $this->assign("user_blogs",$blogs);
            $this->display("BlogMainPage/showMainPage");
        }
        else
        {
            $this->error("登录超时,请重新登录");
        }
    }

    public function showCarePersonsBlogs()
    {
        $this->showMainPage(3);
    }

    public function showCollectionBlogs()
    {
        $this->showMainPage(4);
    }

    public function showMoreBlogs()
    {
        if(!ISPOST)
        {
            return ;
        }

        $firstBlog = I("post.firstBlog");
        $blogsCount = I("post.blogsCount");
        $pageMode = I("post.pageMode");
        $user_id = session("id");

        $blogsDB=NULL;
        $newBlogs = NULL;
        if($pageMode==1)
        {
            //个人微博页的时候返回的微博数
            $blogsDB = new GetblogsModel("article");
            $newBlogs = $blogsDB->getBlogsByID($user_id,$firstBlog,$blogsCount);
        }
        else if($pageMode==3)
        {
            //关注的人的微博
            $blogsDB_care = new GetblogsModel("article");
            $newBlogs = $blogsDB_care->getCarePersonsBlogsByID($user_id,$firstBlog,$blogsCount);
        }
        else if($pageMode==4)
        {
            //收藏的微博
            $blogsDB_care = new GetblogsModel("article");
            $newBlogs = $blogsDB_care->getCollectionBlogsByID($user_id,$firstBlog,$blogsCount);
        }

        $this->ajaxReturn($newBlogs,"json");
    }

    public function submitMyBlog()
    {
        $blogContent = $_POST['blogString'];

        $submitBlog = new SubmitBlogModel("article");
        $res = $submitBlog->submitBlog($blogContent);

        $this->ajaxReturn($res);
    }

    public function deleteMyBlog()
    {
        $blogID = $_POST['articleID'];

        $submitBlog = new SubmitBlogModel("article");
        $res = $submitBlog->deleteBlog($blogID);

        $this->ajaxReturn($res);
    }

    public function searchSomething()
    {
        $t = $_GET['searchContent'];

        echo $t;
        //$this->ajaxReturn("feafe");
    }

    public function submitTalk()
    {
        $user_id = session("id");
        $user_name = session("name");
        $article_id = I("post.articleId");
        $talk_content = I("post.talkContent");

        $talkDb = new SubmitTalkModel("talk");
        $res = $talkDb->submitTalk($talk_content,$user_id,$user_name,$article_id);
        var_dump($res);
    }

    public function showTalks()
    {
        $article_id = I("post.articleId");
        $f = I("post.f");
        $c = I("post.c");

        $talkDb = new SubmitTalkModel("talk");
        $resCount = $talkDb->getTalkCount($article_id);
        $res = $talkDb->getTalk($article_id,$f,$c);
        $res[0]["count"]=$resCount;
        $this->ajaxReturn($res,"json");
    }
}