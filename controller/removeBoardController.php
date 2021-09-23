<?php
    require_once '../dao/boardDAO.php';
    require_once '../util/Util.php';

    session_start();
    
    if(!isset($_GET['id'])) {
        Util::setMessage(Msg::$WRONG_LOCATION)->back();
        exit;
    }
    $index = $_GET['id'];
    
    $dao = new BoardDAO();
    $board = $dao->getBoard([$index]);
    
    echo isset($_SESSION['user']);
    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    } else {
        Util::setMessage(Msg::$WRONG_LOCATION)->back();
        exit;
    }

    if($user->id !== $board->id) {
        Util::setMessage(Msg::$WRONG_LOCATION)->back();
        exit;
    }

    //삭제
    if($dao->removeBoard([$index])) {
        Util::setMessage('정상적으로 삭제되었습니다.')->go('/');
    } else {
        Util::setMessage(Msg::$DB_ERROR)->back();
    }