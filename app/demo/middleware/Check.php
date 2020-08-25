<?php 
namespace app\demo\middleware;


class Check{
//方法名称不可变，请求开始
    public function handle($request,\Closure $next){

        $request->type="demo-E";
        return $next($request);
    }

    //请求结束的response 调用  中间件结束调度
    public function end(\think\response $response){

    }
}
?>