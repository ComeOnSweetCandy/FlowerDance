<?php
namespace Home\Model;
use Think\Model;

class SearchModel extends Model\RelationModel
{
    protected $_link = array
    (
        "care"=>array
        (
            "mapping_type"=>self::HAS_ONE,
            "foreign_key"=>"care_user_id",
            "condition"=>"",
            "mapping_name"=>"care",
            "as_fields"=>"user_id:the_true_user_id",
            "mapping_fields"=>"user_id",
        ),
    );

    public function search($searchContent,$userId)
    {
        $this->_link["care"]["condition"]="user_id=".$userId;

        $data = array
        (
            "user_id"=>$searchContent,
            "user_name"=>$searchContent,
            "_logic"=>"OR",
        );


        return $this->relation(true)->where($data)->select();
    }
}