<?php
    require_once '../dao/userDAO.php';
    require_once '../util/Util.php';

    $formList = ["id" => '', "password" => ""]; //formList

    foreach(array_keys($formList) as $key) {
        if(! isset($_POST[$key]) ) {
            Util::setMessage(Msg::$REQUEST_ERROR)->back();
            exit;
        } 

        $formList[$key] = trim($_POST[$key]);

        if(trim($formList[$key]) === '') {
            Util::setMessage(Msg::$REQUEST_ERROR)->back();
            exit;
        } 
    }

    $dao = new UserDAO();

    /*
    1. 아이디 조회
    2. 비밀번호 검사
    3. session 달기
    */

    
    if(!$dao->isUser([$formList['id']])) {
        Util::setMessage('존재하지 않는 아이디입니다.')->back();
        exit;
    }

    $user = $dao->getUser($formList);

    if(!$user) {
        Util::setMessage('비밀번호가 일치하지 않습니다..')->back();
        exit;
    }

    session_start();
    
    $_SESSION['user'] = $user;

    Util::setMessage("정상적으로 로그인이 완료되었습니다.")->go('/');
    exit;
    //마지막 처리

