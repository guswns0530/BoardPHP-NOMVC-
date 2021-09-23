<!DOCTYPE html>
<html lang="ko">

<?php require_once("../template/head.php"); ?>

<body>
    <?php require_once("../template/header.php"); ?>
    <div class="container">
        <div class="container p-5">
        <div class="title text-center mb-5">
            <h1 class="fw-bolder">환영합니다!</h1>
            <p class="lead">가입하여서 사람들과 소통하세요</p>
        </div>
        <form class="px-5" method="post" action="/controller/registerController.php">
            <div class="mb-3">
                <label for="id" class="form-label fw-bolder">아이디</label>
                <input type="text" class="form-control" id="id" placeholder="id" name="id">
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label fw-bolder">비밀번호</label>
                <input type="password" class="form-control" id="pwd" placeholder="password" name="password">
                <div id="emailHelp" class="form-text">* 8자이상 20자 이하.</div>
            </div>
            <div class="mb-3">
                <label for="pwdc" class="form-label fw-bolder">비밀번호 확인</label>
                <input type="password" class="form-control" id="pwdc" placeholder="password" name="passwordc">
                <div id="emailHelp" class="form-text">* 다시한번 입력해주세요</div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <label for="name" class="form-label fw-bolder">이름</label>
                    <input type="text" class="form-control" id="name" placeholder="name" name="name">
                    <div id="emailHelp" class="form-text">* 이름을 입력해주세요</div>
                </div>
                <div class="col">
                    <label for="nickname" class="form-label fw-bolder">닉네임</label>
                    <input type="text" class="form-control" id="nickname" placeholder="nickname" name="nickname">
                    <div id="emailHelp" class="form-text">* 커뮤니티내에서 사용하실 이름을 입력해주세요</div>
                </div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary py-2" >가입하기</button>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                </div>
                <div class="col-md-1 text-center text-secondary">
                    or
                </div>
                <div class="col">
                    <hr>
                </div>
            </div>
            <div class="d-grid">
                <a href="/view/login.php" type="submit" class="btn btn-outline-primary py-2">로그인하기</a>
            </div>
        </form>
    </div>
</body>

</html>