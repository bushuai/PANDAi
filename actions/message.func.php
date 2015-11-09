<?php
    /**
     * Created by PhpStorm.
     * User: bushuai
     * Date: 2015/1/11
     * Time: 17:40
     */
    require_once('setting.php');
    require_once(APP_ROOT.'config.php');
    session_start();
    $act = isset($_POST[ 'act' ]) ? $_POST[ 'act' ] : '';
    if ($act == 'ind_s') {
        $message_id = isset($_POST[ 'message_id' ]) ? $_POST[ 'message_id' ] : '';
        $sql = 'select * from view_user_message_tag where message_id =  ' . $message_id;
        $res = $db->fetchArray ($db->query ($sql));
        echo json_encode ($res);
    }

    if ($act == 'msg_i') {
        $user_id = $_SESSION[ 'user' ][ 'user_id' ];
//        $publish_time = date('Y-M-D');
        $content = $_POST[ 'content' ];
        $tag_id = $_POST[ 'tag_id' ];
        $data = compact ('user_id', 'content', 'tag_id');
        $res = $db->insert ('t_message_info', $data);
        echo $res ? 'success' : 'failed';
    }

    if ($act == 'cmmt') {
        $user_id = $_SESSION[ 'user' ][ 'user_id' ];
        $content = $_POST[ 'content' ];
        $type = $_POST[ 'message_type' ];
        $data = compact ('user_id', 'content','type');
        $db->insert ('t_message_info', $data);
        $message_id = $_POST[ 'message_id' ];
        $action_message_id = $db->insertId ();
        $action_user_id = $user_id;
        $data = compact ('action_message_id','action_user_id', 'message_id','type');
        $res = $db->insert ('t_message_action', $data);
        echo $res ? 'success' : 'failed';
    }

?>