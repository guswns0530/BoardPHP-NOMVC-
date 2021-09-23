<?php
    session_start();
    require_once '../dao/boardDAO.php';
    require_once '../util/Util.php';

    $index = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    Util::isTrim([$title, $content]);

    if(trim($index) === '') {
        Util::setMessage(Msg::$WRONG_LOCATION)->go('/');
        exit;
    }

    if(!isset($_SESSION['user'])) {
        Util::setMessage(Msg::$WRONG_LOCATION)->go('/');
        exit;
    }

    $dao = new BoardDAO();

    $result = $dao->modifyBoard([$title, $content, $index]);

    if($result) {
        Util::setMessage('정상적으로 수정되었습니다.')->go('/view/board.php');
    } else {
        Util::setMessage(Msg::$DB_ERROR)->back();
    }



    