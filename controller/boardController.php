<?php
    require_once '/xampp/htdocs/dao/boardDAO.php';

    $query = '';
    $page = 1;

    if(isset($_GET['query'])) {
        $query = $_GET['query'];
    }
    //페이지
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    
    $dao = new BoardDAO();
    //검색

    if(trim($query) !== '') {
        $boardList = $dao->queryBoard($query, $page);
        $length = $dao->queryCountBoard($query);
    } else {
        $boardList = $dao->getBoardList([$page]);
        $length = $dao->getBoardLength();
    }


    class PageNation {
        public $prev = true;
        public $next = true;

        public function __construct($page, $length)
        {   
            $this->page = $page;
            $this->maxPage = ceil($length / 6);

            $this->pageStart = floor(( $page - 1) /10) * 10 + 1 ;
            $this->pageLast = $this->pageStart + 9 > $this->maxPage ? $this->maxPage : $this->pageStart + 9;

            $this->setButton();
        }

        public function setButton() {
            if($this->pageLast <= 10) {
                $this->prev = false;
            }
            if($this->maxPage - $this->pageStart <= 9) {
                $this->next =false;
            }
        }
    }

    $pg = new PageNation($page, $length);
