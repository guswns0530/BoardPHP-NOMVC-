<?php
    require_once '/xampp/htdocs/util/DB.php';

    class BoardDAO {
        public function __construct() {
            $this->db = DB::getInstance();
        }

        public function insertBoard($data = []) {
            // INSERT INTO `boards`(`index`, `writer`, `title`, `content`, `img`, `date`, `id`) VALUES )
            $sql = "INSERT INTO `boards`(`writer`, `title`, `content`, `img`, `date`, `id`) VALUES (?, ?, ?, ?, SYSDATE(), ?);";

            return $this->db->executeUpdate($sql, $data);
        }

        public function getBoardList($data = []) {
            $page = ($data[0] - 1) * 6;

            $sql = "select * from boards order by `index` desc limit {$page}, 6"; //작동이 안함
            // $sql = "select * from boards where `index` = ?";

            return $this->db->executeAll($sql, $data);
        }   

        public function getBoardLength() {
            $sql = "select count(*) as length from boards";

            return $this->db->execute($sql, [])->length;
        }

        public function getBoard($data) {
            $sql = "select * from boards where `index` = ?";

            return $this->db->execute($sql, $data);
        }

        public function removeBoard($data) {
            $sql = "delete from boards where `index` = ?";

            return $this->db->executeUpdate($sql, $data);
        }

        public function modifyBoard($data) {
            $sql = "update boards set title = ?, content = ? where `index` = ?";

            return $this->db->executeUpdate($sql, $data);
        }

        public function queryBoard($query, $page) {
            $page--;
            $sql = "select * from boards where title like '%{$query}%' order by `index` desc limit {$page}, 6";

            return $this->db->executeAll($sql, []);
        }

        public function queryCountBoard($query) {
            $sql = "select count(*) as length from boards where title like '%{$query}%'";

            return $this->db->execute($sql, [])->length;
        }
    }
