<?php

namespace app\api\middleware;

class Auth
{
    //方法名称不可变，请求开始
    public function handle($request, \Closure $next)
    {

        //前置中间件
        // $userInfo = cache(config("redis.token_pre") . request()->header('Access-Token'));
        // if (!$userInfo) {
        //     return redirect(url('Login/login'), 302);
        // }
        // if (empty($userInfo['id']) && empty($userInfo['name'])) {

        //     return redirect(url('Login/login'), 302);
        // }
        //在此方法之前为前置中间件  之后为后置中间件
        $response = $next($request);

        //后置中间件

        return $response;
    }
    //请求结束的response 调用  中间件结束调度
    public function end(\think\response $response)
    {
    }
}
