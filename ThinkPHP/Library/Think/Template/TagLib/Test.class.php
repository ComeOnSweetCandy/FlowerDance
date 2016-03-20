<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace Think\Template\TagLib;
use Think\Template\TagLib;
/**
 * Html标签库驱动
 */
class Test extends TagLib{
    protected $tags=array
    (
        'myTest' => array('attr'=>'color,border','close'=>1),
    );

    public function _myTest($tag,$content)
    {
        $color="";
        $border="";
        if(isset($tag['color']))
        {
            $color="color:".$tag['color'].";";
        }
        if(isset($tag['border']))
        {
            $border="border:".$tag['border']."px solid #f00;";
        }

        $css = $color.$border;

        return "<div style='".$css."'>".$content."</div>";
    }
}