<?php
    require_once '/xampp/htdocs/util/DB.php';

    class UserDAO {
        public function __construct() {
            $this->db = DB::getInstance();
        }

        public function insertUser($data) {
            $sql = "INSERT INTO user(id, password, name, nickname) VALUES(?, PASSWORD(?), ?, ?)";
            
            return $this->db->executeUpdate($sql, [$data['id'], $data['password'], $data['name'], $data['nickname']] );
        }

        public function getUser($data) {
            $sql = "SELECT * FROM user where id = ? || password = PASSWORD(?)";

            return $this->db->execute($sql, [$data['id'], $data['password']]);
        }

        public function isUser($data) {
            $sql = "SELECT * FROM user where id = ?";

            return $this->db->execute($sql, $data);
        }
        
        public function isNickname($data) {
            $sql = "SELECT * FROM user where nickname = ?";

            return $this->db->execute($sql, $data);
        }
    }