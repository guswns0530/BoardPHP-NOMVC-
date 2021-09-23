<!DOCTYPE html>
<html lang="ko">

<head>
    <?php require_once("../template/head.php"); ?>
</head>

<body>
    <?php require_once("../template/header.php"); ?>
    <div class="container mt-5 bg-light">
        <div class="card px-5 pt-5 pb-3">
            <form action="/controller/writeBoardController.php" method="POST">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="fw-bold mb-4">글 등록하기</h3>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"> 제목 </span>
                            </div>
                            <input type="text" class="form-control" name="title" placeholder="제목을 입력하세요">
                        </div>
                    </div>

                    <div style="background-color: #ebecef; height: 1px" class="my-4"></div>
                    <div class="input-group" style="height: 600px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text h-100">
                                내용
                            </span>
                        </div>
                        <textarea class="form-control" name="content" placeholder="내용을 입력하세요"></textarea>
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