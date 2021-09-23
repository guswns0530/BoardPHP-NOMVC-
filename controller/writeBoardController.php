<?php
    require_once '../dao/boardDAO.php';
    require_once '../util/Util.php';
    
    session_start();

    if(!isset($_SESSION['user'])) {
        Util::setMessage('로그인후 이용해주세요.')->go('/view/login.php');
        exit;
    }

    $user = $_SESSION['user'];

    $title = $_POST['title'];
    $content = $_POST['content'];

    //빈값 확인
    Util::isTrim([$title, $content]);

    $dao = new BoardDAO();
    $result = $dao->insertBoard([$user->nickname, $title, $content, '', $user->id]);

    if($result) {
        Util::setMessage('게시물이 등록되었습니다.')->go('/view/board.php');
    } else {
        Util::setMessage(Msg::$DB_ERROR)->back();
    }

