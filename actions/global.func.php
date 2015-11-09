<?php
/**
 * Created by PhpStorm.
 * User: bushuai
 * Date: 2015/1/5
 * Time: 12:23
 */
    require_once('setting.php');
    require_once(APP_ROOT.'config.php');
    //登录验证
    function isLogin()
    {
        if (!isset($_SESSION['user'])) {
            $url = APP_PATH.'index.php';
            header('Location:' . $url);
        }
    }

    //去掉字符当中的空格
    function replaceSpace($res){
        return $res.replace('/\s+/g','');
    }

?>