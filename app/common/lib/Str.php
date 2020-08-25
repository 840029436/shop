<?php 
namespace app\common\lib;

class Str {
    /**
     * 生成登录所需的token
     */
    public static function getLoginToken($string){

        $str=md5(uniqid(md5(microtime(true)),true));//生成一个不会重复的token
        $token=sha1($str.$string);
        return $token;
    }
}
?>