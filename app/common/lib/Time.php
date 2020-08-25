<?php

declare(strict_types=1);

namespace app\common\lib;

class Time
{

    public static function userLoginExpiresTime(int $type = 2): int
    {

        $type = !in_array($type, [1, 2]) ? $type : 2;

        if ($type == 1) {
            $day = $type * 7;
        } else {
            $day = $type * 15;
        }
        //测试一下 
        return $day * 24 * 3600;
    }
}
