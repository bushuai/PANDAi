<?php
    session_start();
    /**
     * Created by PhpStorm.
     * User: bushuai
     * Date: 2014/12/27
     * Time: 16:58
     */
    require_once('setting.php');
    require_once(APP_ROOT.'config.php');
    $table = 't_user_info';
    $act = isset($_GET['act']) ? $_GET['act'] : '';
    if ($act == 'login') {
        $loginId = isset($_POST['loginId']) ? addslashes($_POST['loginId']) : '';
        $pwd = isset($_POST['loginPwd']) ? md5($_POST['loginPwd']) : '';
        $sql = "select * from t_user_info where login_id = '$loginId' and pwd = '$pwd'";
        $res = $db->getOne($sql);
        if ($res) {
            $_SESSION['user'] = $res;
            echo 'success';
        } else {
            echo 'failed';
        }
    }
    if ($act == 'reg') {
        $login_id = isset($_POST['loginId']) ? $_POST['loginId'] : '';
        $pwd = isset($_POST['loginPwd']) ? md5($_POST['loginPwd']) : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $regtime = date('Y-m-d');
        $token = md5($login_id . $pwd . $regtime);
        $token_exptime = $regtime + 24 * 3600;
        $data = compact('login_id', 'pwd', 'email', 'regtime', 'token', 'token_exptime');
        $res = $db->insert($table, $data);
        echo $res == 1 ? 'success' : 'failed';
    }
?>