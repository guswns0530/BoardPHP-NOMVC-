<?php
    require_once '../dao/userDAO.php';
    require_once '../util/Util.php';

    $formList = ["id" => '', "password" => "", "passwordc" => "", "name" => "", "nickname" => ""]; //formList

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
    1. 아이디 길이
    2. 아이디 중복
    3. 비밀번호 길이
    4. 비밀번호 조회
    5. 닉네임 중복 조회
    */
    
    if($dao->isUser([$formList['id']])) {
        Util::setMessage('중복된 아이디 입니다. 다른 아이디로 로그인하세요.')->back();
        exit;
    }

    if($formList['password'] !== $formList['passwordc']) {
        Util::setMessage('비밀번호가 일치하지 않습니다. 다시 시도해주세요')->back();
        exit;
    }
    if($dao->isNickname([$formList['nickname']])) {
        Util::setMessage('중복된 별명입니다. 별명을 바꾸시고 다시 시도해주세요.')->back();
        exit;
    }

    //검사 끝
    $result = $dao->insertUser($formList);

    if(!$result) {
        Util::setMessage('처리중 DataBase에서 오류가 났습니다. 잠시후 다시 시도해주세요')->back();
        exit;
    }

    Util::setMessage("정상적으로 회원가입이 완료되었습니다.")->go('/');
    exit;
    //마지막 처리

