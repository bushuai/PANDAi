<?php
    /**
     * Created by PhpStorm.
     * User: bushuai
     * Date: 2015/1/5
     * Time: 10:53
     */

    define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'root');
    define('DB_PWD', '');
    define('DB_NAME', 'weibo');
    define('DB_CODING', 'utf8');
    define('DB_PCON', '');
    define('DB_PRE', '');
    define('APP_PATH', str_replace ('\\', '/', dirname (__FILE__) . DIRECTORY_SEPARATOR));
    define('CURR_PATH', './');
    define('APP_NAME', 'PANDAi');
    require_once (APP_PATH.'core/db.class.php');
    $db = new ms_new_mysql(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_PRE, DB_CODING, DB_PCON);

?>

