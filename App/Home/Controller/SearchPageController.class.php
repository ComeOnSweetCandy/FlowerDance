<?php
namespace Home\Controller;
use Home\Model\SearchModel;
use Think\Controller;

class SearchPageController extends Controller
{
    public function searchPage()
    {
        $userId = session("id");
        $searchContent = I("get.searchContent");
        $searchDb = new SearchModel("user");
        $user_res = $searchDb->search($searchContent,$userId);

        for($i = 0 ; $i<sizeof($user_res) ;$i++)
        {
        }

        if($user_res)
        {
        }
        else
        {

        }

        $this->assign("searchContent",$searchContent);
        $this->assign("searchResContent",sizeof($user_res));
        $this->assign("searchResArray",$user_res);
        $this->display();
    }
}