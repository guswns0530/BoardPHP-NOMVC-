<!DOCTYPE html>
<html lang="ko">

<head>
    <?php require_once("../template/head.php"); ?>
</head>

<body>
    <?php require_once("../template/header.php"); ?>
    <?php require_once("../controller/readController.php"); ?>

    <div class="container mt-5 bg-light">
        <div class="card px-5 pt-5 pb-3">
            <div class="card-body">
                <div class="card-title">
                    <h4>
                        <?= nl2br(htmlentities($result->title)) ?>
                    </h4>
                </div>
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center p-1">
                        <img class="rounded-circle border border-secondary" src="/img/profile.png" alt="" style="width: 26px; height:26px;">
                        <div class="nickname text-secondary text-center ms-2 h-auto" style="line-height: 20px; font-size: 16px">
                            <?= nl2br(htmlentities($result->writer)) ?>
                        </div>
                    </div>
                    <div class="text-secondary text-center ms-3" style="font-size: 14px"><?= $result->date ?></div>
                </div>
                <div style="background-color: #ebecef; height: 1px" class="my-4"></div>
                <div class="card-text" style="white-space: break-spaces;"><?= htmlentities($result->content) ?></div>
                <div class="d-flex mt-3 justify-content-end">
                    <?php if ($modify) : ?>
                        <a href="/view/modify.php?id=<?= $result->index ?>" class="btn btn-outline-success me-2">수정</a>
                        <a href="/controller/removeBoardController.php?id=<?= $result->index ?>" class="btn btn-outline-danger">삭제</a>
                    <?php endif; ?>
                </div>
                <div class="card-footer mt-3">
                    <form action="" method="POST">
                        <input type="text" class="form-control">
                        <button>
                            <span class="input-group-text h-100">
                                등록
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>