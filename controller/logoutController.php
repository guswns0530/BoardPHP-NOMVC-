<?php
    require_once '../util/Util.php';
    session_start();

    if(!isset($_SESSION['user'])) {
        Util::setMessage(Msg::$WRONG_LOCATION)->go("/");
        exit;
    }

    unset($_SESSION['user']);
    Util::setMessage('로그아웃 되었습니다.')->go('/');
    exit;
?>