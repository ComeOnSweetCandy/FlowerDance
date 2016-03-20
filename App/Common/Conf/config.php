<?php
return array(
	//'配置项'=>'配置值'

    //可以访问的目录
    'MODULE_ALLOW_LIST'=>array('Admin','Home'),
    //设置默认目录
    'DEFAULT_MODULE'=>'Home',

    //设置模版的后缀
    'TMPL_TEMPLATE_SUFFIX'=>'.tpl',
    //设置默认主题目录
    'DEFAULT_THEME'=>'Tpl',

    //关闭缓存
    'HTML_CACHE_ON'=>false,
    'TMPL_CACHE_ON'=>false,
    'ACTION_CACHE_ON'=> false,


    //数据库连接信息 采用PDO方式
    //'DB_TYPE'=>'pdo',
    //'DB_USER'=>'root',
    //'DB_PWD'=>'kratos2008dyk',
    //'DB_PREFIX'=>'pb_',
    //'DB_DSN'=>'mysql:host=localhost;dbname=pandablog;charset=UTF8',

    'DB_TYPE'=>'mysql',
    'DB_HOST'=>'127.0.0.1',
    'DB_USER'=>'root',
    'DB_PWD'=>'kratos2008dyk',
    'DB_PREFIX'=>'pb_',
    'DB_PORT'=>3306,
    'DB_NAME'=>'pandablog',

    //开启调试模式
    'APP_STATUS' => 'debug',
    'SHOW_PAGE_TRACE'=>true,

    //重写模式 URL模式
    "URL_MODULE"=>3,
);