<?php 
namespace app\demo\middleware;


class Detail{
//方法名称不可变，请求开始
    public function handle($request,\Closure $next){

        $request->type="demo-Detail";
        return $next($request);
    }

    //请求结束的response 调用  中间件结束调度
    public function end(\think\response $response){

    }
}
?>