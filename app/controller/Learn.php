<?php 
namespace app\controller;
use app\Request;
use think\facade\Request as res;

class Learn{
    function learn(request $request){
        // dump($request->param());
        dump(input());
        dump(request()->param());
        dump(res::param());
        
    }
    public function call($name='',$arguments='')
    {
        return show(0,"方法不存在",null,404);
    }
}
?>