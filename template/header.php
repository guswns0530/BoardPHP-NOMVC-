<style>
    body {
        padding-top: 4.5rem;
    }
</style>
<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">게시판 만들기</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/view/board.php">게시판</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/view/write.php">글쓰기</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" title="미구현">회원목록</a>
                </li>
            </ul>
            <?php if(isset($_SESSION['user'])) : ?>
                <form class="d-flex">
                    <a href="/" class="btn btn-outline-success" type="submit"><?= $_SESSION['user']->nickname?></a>
                    <a href="/controller/logoutController.php" class="btn btn-danger ms-3" type="submit">로그아웃</a>
                </form>
            <?php else : ?> 
                <form class="d-flex">
                    <a href="/view/login.php" class="btn btn-outline-success" type="submit">Login</a>
                    <a href="/view/register.php" class="btn btn-outline-warning ms-3" type="submit">Register</a>
                </form>
            <?php endif;?>
        </div>
    </div>
</nav>