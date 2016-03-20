<?php
namespace Home\Controller;
use Home\Model\CaresoModel;
use Home\Model\LoginModel;
use Think\Controller;
use Think\Page;

class CarepersonListController extends Controller
{
    public function displayPage()
    {
        //兼容性
    }
    public function displayCarePage()
    {
        $userId = session("id");
        $userName = session("name");
        $searchDb = new CaresoModel("user");

        //page分页显示
        $careCount = $searchDb->countCare($userId);
        $page = new Page($careCount,10);
        $show = $page->show();
        $user_res = $searchDb->searchCareList($userId,$page->firstRow,$page->listRows);
        echo $show;

        //冗余
        $userDb = new LoginModel("user");
        $yourInfo = $userDb->getUserAllInfo($userId);

        $this->assign("show_Page",$show);
        $this->assign("care_mode",1);
        $this->assign("user_name",$userName);
        $this->assign("searchResContent",$careCount);
        $this->assign("searchResArray",$user_res);

        $this->assign("yourInfo",$yourInfo);
        $this->assign("userInfo",$yourInfo);

        $this->display("displayPage");
    }
    public function displayListenPage()
    {
        $userId = session("id");
        $userName = session("name");
        $searchDb = new CaresoModel("user");

        //page分页显示
        $listenerCount = $searchDb->countListener($userId);
        $page = new Page($listenerCount,10);
        $show = $page->show();
        $user_res = $searchDb->searchListenerList($userId,$page->firstRow,$page->listRows);

        //冗余
        $userDb = new LoginModel("user");
        $yourInfo = $userDb->getUserAllInfo($userId);

        $this->assign("show_Page",$show);
        $this->assign("care_mode",2);
        $this->assign("user_name",$userName);
        $this->assign("searchResContent",$listenerCount);
        $this->assign("searchResArray",$user_res);

        $this->assign("yourInfo",$yourInfo);
        $this->assign("userInfo",$yourInfo);

        $this->display("displayPage");
    }
}