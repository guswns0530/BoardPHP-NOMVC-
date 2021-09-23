<!DOCTYPE html>
<html lang="ko">
<?php require_once '../template/head.php';?>
<body>
    <?php require_once '../template/header.php';?>

    <div class="container mt-5">
        <div class="container p-5">
        <div class="title text-center mb-5">
            <h1 class="fw-bolder">로그인</h1>
        </div>
        <form class="" method="POST" action="/controller/loginController.php" style="padding: 0 400px">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bolder">아이디</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="id" name="id">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bolder">비밀번호</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password" name="password">
                <div id="emailHelp" class="form-text">공공시설에서 비밀번호 저장을 하지마세요.</div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary py-2">로그인하기</button>
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
                <a href="/view/register.php" type="submit" class="btn btn-outline-primary py-2">회원가입하기</a>
            </div>
        </form>
    </div>
</body>
</html>