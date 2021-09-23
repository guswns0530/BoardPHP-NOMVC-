<?php
    class DB 
    {
        //싱글톤
        public static $db;
        // con
        public $con = null;
        // fetch Option
        private $option = PDO::FETCH_OBJ;

        public static function getInstance() {
            if(self::$db === null) {
                self::$db = new DB();
            }

            return self::$db;
        }

        private function __construct() {
            $host = "localhost";
            $dbname = "phptest1";
            $charset = "utf8mb4";
            $user = "root";
            $pass = "";

            $conStr = "mysql:host=$host; dbname=$dbname; charset=$charset";
            $this->con = new PDO($conStr, $user, $pass);
        }

        public function execute($sql, $data = []) {
            $result = $this->con->prepare($sql);
            $result->execute($data);
            
            return $result->fetch($this->option);
        }   
        
        public function executeAll($sql, $data = []) {
            $result = $this->con->prepare($sql);
            $result->execute($data);

            return $result->fetchAll($this->option);
        }

        public function executeUpdate($sql, $data = []) {
            $result = $this->con->prepare($sql);
            return $result->execute($data);
        }
    }    


    
