<?php
return array(
	//'配置项'=>'配置值'

    //设置模版替换变量
    'TMPL_PARSE_STRING'=>array
    (
        '__JS__'=>__ROOT__.'/Public/'.MODULE_NAME.'/js',
        '__CSS__'=>__ROOT__.'/Public/'.MODULE_NAME.'/css',
        '__IMG__'=>__ROOT__.'/Public/'.MODULE_NAME.'/img',
        '__UPLOAD__'=>__ROOT__.'/Public/'.MODULE_NAME.'/uploads',

        '__APP_VERSION__'=>'1.0.0',
    )
);