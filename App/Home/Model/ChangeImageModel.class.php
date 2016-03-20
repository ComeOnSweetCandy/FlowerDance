<?php
namespace Home\Model;
use Think\Model;

class ChangeImageModel extends Model
{
    public function changeImage($userId,$userImageUrl)
    {
        $conditon = array
        (
            "user_id"=>$userId,
        );
        $data = array
        (
            "user_img"=>$userImageUrl,
        );
        $this->where($conditon)->save($data);
    }
}