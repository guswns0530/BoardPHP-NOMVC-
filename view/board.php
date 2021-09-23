<!DOCTYPE html>
<html lang="ko">
<?php require_once('../template/head.php'); ?>
<?php require_once('../controller/boardController.php'); ?>

<body>
    <?php require_once('../template/header.php'); ?>
    <div class="container mt-5 px-5 bg-lighter">
        <section class="px-5">
            <header class="d-flex  justify-content-between mb-4">
                <div id="header" class="d-flex align-items-end">
                    <h4 class="fw-bolder" style="margin-bottom: 3px">전체글</h3>
                        <div class="lead ms-2 fs-5"><?= $length ? $length : 0?>건</div>
                </div>
                <form action="" method="GET">
                    <div class="row">
                        <form action="/view/board.php" method="get">
                            <input type="text" class="form-control col" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="검색어를 입력하세요" name="query">
                            <button class="btn btn-primary col-md-3" type="submit">입력</button>
                        </form>
                    </div>
                </form>
            </header>
            <div class="list">
                <div class="row">
                    <?php foreach($boardList as $item) : ?>
                        <div class="col-md-6">
                            <div class="card p-2 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title w-100">
                                        <a href="/view/read.php?id=<?= $item->index ?>" class="text-decoration-none text-dark text-nowrap w-100 overflow-hidden" style="display: inline-block;">
                                            <?= nl2br(htmlentities($item->title)) ?>
                                        </a>
                                    </h5>
                                    <p class="card-text text-secondary overflow-hidden" style="max-height: 48px; height: 48px;">
                                        <?= nl2br(htmlentities($item->content)) ?>
                                    </p>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center p-1">
                                            <img class="rounded border border-secondary" src="/img/profile.png" alt="" style="width: 24px; height:24px;">
                                            <div class="nickname text-secondary text-center ms-2 h-auto" style="line-height: 20px; font-size: 16px">
                                                <?= nl2br(htmlentities($item->writer)) ?>
                                            </div>
                                        </div>
                                        <div class="text-secondary text-center ms-3" style="font-size: 14px"><?= $item->date ?></div>
                                    </div>
                                </div>
                            </div> <!-- card-end-->
                        </div> <!-- col-end-->
                    <?php endforeach; ?>
                </div> <!-- row-end -->
            </div> <!-- list-end -->
            <div class="d-flex justify-content-center mt-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item <?=$pg->prev ? "" : "disabled" ?>"><a class="page-link btn btn-primary" href="/view/board.php?page=<?= ceil($pg->page / 10) * 10 - 10 ?>">이전</a></li> <!-- disabled -->

                        <?php for($i = $pg->pageStart; $i <= $pg->pageLast; $i++) : ?>
                            <li class="page-item <?= $pg->page == $i ? "active" : "" ?>"><a class="page-link" href="/view/board.php?page=<?= $i ?>&query=<?=$query?>"><?= $i ?></a></li>
                        <?php endfor; ?>

                        <li class="page-item <?= $pg->next ? "" : "disabled"?>"><a class="page-link" href="/view/board.php?page=<?= $pg->pageStart + 10 ?>">다음</a></li>
                    </ul>
                </nav>
            </div> <!-- page navigaion -->
        </section>
    </div>
    <script src="/js/ajax.js" type="module"></script>
</body>
</html>