<!DOCTYPE html>
<html lang="ko">

<head>
    <?php require_once("../template/head.php"); ?>
    <?php
    require_once '../dao/boardDAO.php';
    require_once '../util/Util.php';

    if (!isset($_GET['id'])) {
        Util::setMessage(Msg::$REQUEST_ERROR)->go('/');
        exit;
    }
    $index = $_GET['id'];
    $dao = new BoardDAO();
    $board = $dao->getBoard([$index]);

    if (!isset($_SESSION['user']) || $_SESSION['user']->id !== $board->id) {
        Util::setMessage('잘못된 접근입니다.')->go('/');
        exit;
    }

    //끝
    ?>
</head>

<body>
    <?php require_once("../template/header.php"); ?>
    <div class="container mt-5 bg-light">
        <div class="card px-5 pt-5 pb-3">
            <form action="/controller/modifyBoardController.php" method="POST">
                <input type="hidden" name="id" value="<?= $board->index ?>">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="fw-bold mb-4">글 수정하기</h3>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"> 제목 </span>
                            </div>
                            <input type="text" class="form-control" name="title" placeholder="제목을입력하세요." value="<?= $board->title ?>">
                        </div>
                    </div>

                    <div style="background-color: #ebecef; height: 1px" class="my-4"></div>
                    <div class="input-group" style="height: 600px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text h-100">
                                내용
                            </span>
                        </div>
                        <textarea class="form-control" name="content" placeholder="내용을 입력하세요"><?= $board->content ?></textarea>
                    </div>
                    <div class="row mt-5 mb-3">
                        <button type="submit" class="btn btn-outline-primary">글 등록</button>
                    </div>
                </div>
            </form>
        </div> <!-- end of card -->
    </div> <!-- end of container -->
</body>

</html>