<?php

namespace app\common\lib;

use ReflectionClass;

class ClassArr
{

    public static function smsClassStat()
    {

        return [
            'Ali'       =>      "app\common\lib\sms\Alisms",
            'Jd'        =>      "app\common\lib\sms\Jdsms",
            'Baidu'     =>      "app\common\lib\sms\Baidusms"
        ];
    }
    public static function initClass($type, $classs, $params = [], $needInstance = false)
    {
        //如果我们工厂模式调用的方法是静态的，那么我们这个地方返回类库  Alisms
        // 如果我们不是静态的则返回的是   对象

        if (!array_key_exists($type, $classs)) {
            return false;
        }
        $className = $classs[$type];


        // new $class() 实例化class对象  new ReflectionClass($class) 获得class的反射对象（包含了元数据copy信2113息）-----InstanceArgs
        //区别 new出来的class，你不能访问他的私有属性/方法，但反射可以。反射返回的对象是class的元数据对象（包含class的所有属性/方法的元数据信息），但不是类本身；类似于查到了类的户口档案，但户口档案不是人！
        return $needInstance == true ? (new ReflectionClass($className))->newInstanceArgs($params) : $className;
    }
}
/**
 * 思路：  首先建立一个方法  返回数组，键的值为 短信服务封装的类的地址，然后新建一个静态的方法，功能是去查找需要用到的短信服务的封装类的地址，找到之后可以直接引用，----->工厂模式
 */
