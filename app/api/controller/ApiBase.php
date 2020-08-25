<?php
/*
    apibase 相当于API模块下的公告，控制器，如果不需要登陆场景继承《这个》制器
    需要登陆场景则继承 AuthBase    控制器 
    */

namespace app\api\controller;

use app\BaseController;
use think\exception\HttpResponseException;

class ApiBase extends BaseController
{
    public function initialize()
    {
        parent::initialize();
    }
    public function show(...$args)
    {
        throw new HttpResponseException(show(...$args));
    }
}
