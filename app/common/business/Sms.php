<?php

declare(strict_types=1);

namespace app\common\business;

use app\common\lib\Num;
use app\common\lib\ClassArr;

class Sms
{

    //阿里云短信验证逻辑处理
    public static function sendCode(string $phoneNumber, int $len = 6, $type = 'ali'): bool
    {

        //生成验证码4 位或者6位数字
        $code = Num::getCode($len);
        // $sms = Alisms::sendCode($phoneNumber,$code);
        //工厂模式   
        $type = ucfirst($type);
        // $class = "app\common\lib\sms\\" . $type . 'sms';
        // $sms = $class::sendCode($phoneNumber, $code);
        $classStat = ClassArr::smsClassStat();
        $classObj = ClassArr::initClass($type, $classStat);
        // dump($classObj);
        // die();
        $sms = $classObj::sendCode($phoneNumber, $code);
        if ($sms) {
            //将短信验证码记录到redis中，并需要给出一个失效时间
            cache(config("redis.code_pre") . $phoneNumber, $code, config("redis.code_expire"));
        }
        return $sms;
    }
}
