<?php
class Util
{
    public static function setMessage($message)
    {
        $message = Msg::getError($message);
        return new Loc($message);
    }

    public static function isTrim($arr)
    {
        foreach ($arr as $text) {
            if (trim($text) === '') {
                self::setMessage(Msg::$REQUEST_ERROR)->back();
                exit;
            }
        }
    }
}

//Msg 
class Msg
{
    private static $MSG = null;

    public static function getError($i)
    {
        //초기화 설정
        if(self::$MSG === null) {
            self::$MSG = [
                0 => "Error",
                1 => "필수값이 비어있습니다.",
                2 => "잘못된 경로입니다.",
                3 => "DB접속중 오류가 발생하였습니다. 잠시후 다시 시도해주세요."
            ];
        }
        

        if(isset(self::$MSG[$i])) {
            return self::$MSG[$i];
        } else {
            return $i;
        }
    }

    public static $ERROR = 0;
    public static $REQUEST_ERROR = 1;
    public static $WRONG_LOCATION = 2;
    public static $DB_ERROR = 3;
}

class Loc
{
    public $message = null;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function go($url)
    {
        echo "<script>";
        echo "alert('{$this->message}');";
        echo "location.href='{$url}';";
        echo "</script>";
    }

    public function back()
    {
        echo "실행됨";
        echo "<script>";
        echo "alert('{$this->message}');";
        echo "history.back();";
        echo "</script>";
    }
}
