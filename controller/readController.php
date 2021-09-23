<?php
    require_once '../dao/boardDAO.php';
    require_once '../util/Util.php';

    if(!isset($_GET['id'])) {
        Util::setMessage(Msg::$WRONG_LOCATION)->back();
        exit;
    }
    $index = $_GET['id'];

    $dao = new BoardDAO();
    $result = $dao->getBoard([$index]);
    if(!$result) {
        Util::setMessage('존재하지 않는 글입니다.')->go('/view/board.php');
    }

    $modify = false;
    if(isset($_SESSION['user'])) {
       $user = $_SESSION['user'];
       $modify = $user->id === $result->id ? true : false;
    }
?>

    

