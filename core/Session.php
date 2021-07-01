<?php


namespace app\core;


class Session
{
   protected const FLASH_KEY = "flash_messages";
    public function __construct()
    {
        session_start();
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key => $value)
        {
$flashMessages['remove']=true;
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
       // var_dump($_SESSION[self::FLASH_KEY]);exit;
    }

    public function setFlash($key,$message)
{
   $_SESSION[self::FLASH_KEY][$key] = [
       'removed'=>false,
       'value'=>$message,
   ];
}
public function getFlash($key)
{

}

public function __destruct()
{
    // TODO: Implement __destruct() method.
    //iterate over markedto be removed
}
}