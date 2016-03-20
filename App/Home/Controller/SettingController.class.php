<?php
namespace Home\Controller;
use Home\Model\ChangeImageModel;
use Think\Controller;
use Think\Uploads;
use Think\Upload;

class SettingController extends Controller
{
    public function displaySettingPage()
    {
        $this->display();
    }

    public function Upload()
    {
        $data = array
        (
            "rootPath"=>"./Public/Home/uploads/",
            "savePath"=>"",
            "maxSize"=>3145728,
            "exts"=>array("jpg","jpeg","gif","png"),
        );
        $upload  = new Upload($data);
        $res = $upload->upload();

        if(!$res)
        {
            $this->error($upload->getError());
        }
        else
        {
            foreach ($res as $value)
            {
                $user_id = session("id");
                $savePath =$value["savepath"].$value["savename"];

                $changeImage = new ChangeImageModel("user");
                $changeImage->changeImage($user_id,$savePath);


                echo "<script>parent.returnImgUrl('".$savePath."');</script>";
            }
        }
    }
}