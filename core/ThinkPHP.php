<?php

$dbconfig=array(
    'DB_TYPE'   => 'mysql',       // 数据库类型
    'DB_HOST'   => '127.0.0.1',       // 服务器地址
    'DB_NAME'   => 'rongzbaodb',       // 数据库名
    'DB_USER'   => 'root',       // 用户名
    'DB_PWD'    => 'root',        // 密码
    'DB_PORT'   => '3306',       // 端口
    'DB_PREFIX' => 'pay_',     // 数据库表前缀
    
);

$loaction=$_SERVER["DOCUMENT_ROOT"]."/core/Library/Think/Think.class.php";
require_once($loaction);
require_once($_SERVER["DOCUMENT_ROOT"]."/core/Common/functions.php");
C($dbconfig);

// 应用初始化 
Think\Think::start();

/*
use \Think\Db;
use \Think\Model;
//$db=Db::getInstance($dbconfig);
 //print_r ($db);*/


